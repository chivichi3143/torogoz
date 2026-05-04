<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

trait ResolvesPublicStorageUrl
{
    protected function publicDiskUrl(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        $path = str_replace('\\', '/', $path);

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        if (str_starts_with($path, '[') || str_starts_with($path, '{')) {
            $decoded = json_decode($path, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $first = reset($decoded);
                if (is_string($first) && $first !== '') {
                    $path = str_replace('\\', '/', $first);
                }
            }
        }

        if (Storage::disk('public')->exists($path)) {
            return $this->absolutePublicStorageUrl($path);
        }

        if (Storage::disk('local')->exists($path)) {
            return URL::signedRoute('storage.local', ['path' => $path], null, false);
        }

        return null;
    }

    /**
     * URL al archivo en el disco public, usando el mismo host y puerto que la petición HTTP
     * (evita mezclar APP_URL con otro origen y ERR_CONNECTION_REFUSED en desarrollo).
     */
    protected function absolutePublicStorageUrl(string $path): string
    {
        $relative = '/storage/'.ltrim($path, '/');

        if (! app()->runningInConsole() && request()->getHttpHost() !== '') {
            return request()->getScheme().'://'.request()->getHttpHost().$relative;
        }

        return $relative;
    }
}
