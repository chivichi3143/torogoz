<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class WebpUploader
{
    public static function storeUploadedFileAsWebp(
        UploadedFile $file,
        string $disk = 'public',
        ?string $directory = null,
        int $quality = 82,
    ): string {
        $realPath = $file->getRealPath();

        if (! is_string($realPath) || $realPath === '' || ! is_file($realPath)) {
            throw new RuntimeException('No se pudo leer la imagen temporal para convertir a WebP.');
        }

        $webpBinary = self::toWebpBinary($realPath, $quality);

        $directory = trim((string) $directory, '/');
        $filename = Str::ulid().'.webp';
        $path = ltrim(($directory !== '' ? $directory.'/' : '').$filename, '/');

        Storage::disk($disk)->put($path, $webpBinary);

        return $path;
    }

    private static function toWebpBinary(string $sourcePath, int $quality = 82): string
    {
        if (! function_exists('imagewebp')) {
            throw new RuntimeException('Tu servidor no tiene soporte GD/WebP habilitado.');
        }

        $imageInfo = @getimagesize($sourcePath);
        $mimeType = $imageInfo['mime'] ?? null;

        if (! is_string($mimeType)) {
            throw new RuntimeException('No se pudo detectar el tipo de imagen para convertirla a WebP.');
        }

        $image = match ($mimeType) {
            'image/jpeg' => @imagecreatefromjpeg($sourcePath),
            'image/png' => @imagecreatefrompng($sourcePath),
            'image/gif' => @imagecreatefromgif($sourcePath),
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($sourcePath) : false,
            default => false,
        };

        if (! $image) {
            throw new RuntimeException("Formato de imagen no soportado para conversión a WebP: {$mimeType}");
        }

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);

        ob_start();
        $ok = imagewebp($image, null, $quality);
        $binary = ob_get_clean();

        imagedestroy($image);

        if (! $ok || ! is_string($binary) || $binary === '') {
            throw new RuntimeException('Falló la conversión de la imagen a WebP.');
        }

        return $binary;
    }
}
