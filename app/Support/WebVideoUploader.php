<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class WebVideoUploader
{
    public static function storeUploadedVideoForWeb(
        UploadedFile $file,
        string $disk = 'public',
        ?string $directory = null,
        int $crf = 24,
        int $maxWidth = 1920,
    ): string {
        if ($file->getSize() !== false && $file->getSize() < 100 * 1024) {
            throw new RuntimeException('El video es demasiado pequeño para un fondo de hero. Sube un archivo MP4/WEBM válido (mínimo 100KB).');
        }

        $realPath = $file->getRealPath();

        if (! is_string($realPath) || $realPath === '' || ! is_file($realPath)) {
            throw new RuntimeException('No se pudo leer el video temporal para convertirlo.');
        }

        $outputPath = self::temporaryOutputPath('.mp4');
        $binary = (string) env('FFMPEG_BINARY', 'ffmpeg');

        // H.264 + CRF + sin audio para alta compatibilidad y peso optimizado en web.
        $command = [
            $binary,
            '-y',
            '-i', $realPath,
            '-an',
            '-c:v', 'libx264',
            '-crf', (string) $crf,
            '-pix_fmt', 'yuv420p',
            '-movflags', '+faststart',
            '-vf', "scale='min({$maxWidth},iw)':-2:force_original_aspect_ratio=decrease",
            $outputPath,
        ];

        $process = new Process($command);
        $process->setTimeout(600);
        $process->run();

        if (! $process->isSuccessful()) {
            $stderr = trim($process->getErrorOutput());
            $stdout = trim($process->getOutput());
            $message = $stderr !== '' ? $stderr : $stdout;

            if (Str::contains(Str::lower($message), ['not found', 'no se reconoce', 'not recognized'])) {
                return self::storeWithoutConversionIfWebCompatible($file, $disk, $directory);
            }

            throw new ProcessFailedException($process);
        }

        if (! is_file($outputPath)) {
            throw new RuntimeException('La conversión de video no generó archivo de salida.');
        }

        $binaryContents = file_get_contents($outputPath);
        @unlink($outputPath);

        if (! is_string($binaryContents) || $binaryContents === '') {
            throw new RuntimeException('No se pudo leer el video convertido para guardarlo.');
        }

        $directory = trim((string) $directory, '/');
        $filename = Str::ulid().'.mp4';
        $path = ltrim(($directory !== '' ? $directory.'/' : '').$filename, '/');

        Storage::disk($disk)->put($path, $binaryContents);

        return $path;
    }

    private static function storeWithoutConversionIfWebCompatible(
        UploadedFile $file,
        string $disk,
        ?string $directory,
    ): string {
        $extension = Str::lower((string) $file->getClientOriginalExtension());
        $mime = Str::lower((string) $file->getMimeType());

        $allowed = ['mp4', 'webm'];
        $isCompatible = in_array($extension, $allowed, true)
            || in_array($mime, ['video/mp4', 'video/webm'], true);

        if (! $isCompatible) {
            throw new RuntimeException('El servidor no tiene FFmpeg. Sube un video MP4 o WEBM, o instala FFmpeg para convertir otros formatos.');
        }

        $directory = trim((string) $directory, '/');
        $safeExtension = in_array($extension, $allowed, true) ? $extension : 'mp4';
        $filename = Str::ulid().'.'.$safeExtension;
        $path = ltrim(($directory !== '' ? $directory.'/' : '').$filename, '/');

        $stream = fopen($file->getRealPath(), 'rb');
        if ($stream === false) {
            throw new RuntimeException('No se pudo leer el video temporal para guardarlo.');
        }

        Storage::disk($disk)->put($path, $stream);
        fclose($stream);

        $storedSize = Storage::disk($disk)->size($path);
        if (is_int($storedSize) && $storedSize < 100 * 1024) {
            Storage::disk($disk)->delete($path);
            throw new RuntimeException('El video subido es demasiado pequeño o inválido para usarse como fondo del hero.');
        }

        return $path;
    }

    private static function temporaryOutputPath(string $extension): string
    {
        return rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR)
            .DIRECTORY_SEPARATOR
            .'hero-video-'.Str::ulid()
            .$extension;
    }
}
