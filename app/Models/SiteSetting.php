<?php

namespace App\Models;

use App\Models\Concerns\ResolvesPublicStorageUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSetting extends Model
{
    use ResolvesPublicStorageUrl;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::updating(function (self $setting): void {
            if (! $setting->isDirty('hero_video_path')) {
                return;
            }

            $oldPath = (string) $setting->getOriginal('hero_video_path');
            $newPath = (string) ($setting->hero_video_path ?? '');

            if ($oldPath !== '' && $oldPath !== $newPath) {
                $setting->deleteManagedVideoFromPublicDisk($oldPath, 'hero-videos/');
            }
        });

        static::deleting(function (self $setting): void {
            $setting->deleteManagedVideoFromPublicDisk((string) ($setting->hero_video_path ?? ''), 'hero-videos/');
        });
    }

    public function heroVideoStorageUrl(): ?string
    {
        $path = $this->attributes['hero_video_path'] ?? null;
        if (! is_string($path) || $path === '') {
            return null;
        }

        $normalized = ltrim(str_replace('\\', '/', $path), '/');
        if (! Storage::disk('public')->exists($normalized)) {
            return null;
        }

        return route('media.public', ['path' => $normalized], absolute: false);
    }

    private function deleteManagedVideoFromPublicDisk(string $path, string $managedPrefix): void
    {
        $normalized = str_replace('\\', '/', trim($path));
        if ($normalized === '') {
            return;
        }

        $normalized = ltrim($normalized, '/');
        if (str_starts_with($normalized, 'storage/')) {
            $normalized = substr($normalized, strlen('storage/'));
        }

        if (! Str::startsWith($normalized, $managedPrefix)) {
            return;
        }

        Storage::disk('public')->delete($normalized);
    }
}
