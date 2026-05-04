<?php

namespace App\Models;

use App\Models\Concerns\ResolvesPublicStorageUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventReview extends Model
{
    use ResolvesPublicStorageUrl;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::updating(function (self $review): void {
            if (! $review->isDirty('photo_path')) {
                return;
            }

            $oldPath = (string) $review->getOriginal('photo_path');
            $newPath = (string) ($review->photo_path ?? '');

            if ($oldPath !== '' && $oldPath !== $newPath) {
                $review->deleteManagedImageFromPublicDisk($oldPath, 'event-reviews/');
            }
        });

        static::deleting(function (self $review): void {
            $review->deleteManagedImageFromPublicDisk((string) ($review->photo_path ?? ''), 'event-reviews/');
        });
    }

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
            'accepted_terms' => 'boolean',
        ];
    }

    public function photoStorageUrl(): ?string
    {
        return $this->publicDiskUrl($this->attributes['photo_path'] ?? null);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    private function deleteManagedImageFromPublicDisk(string $path, string $managedPrefix): void
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
