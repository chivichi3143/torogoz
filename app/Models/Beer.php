<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Beer extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'amargor' => 'integer',
            'cuerpo' => 'integer',
            'aroma' => 'integer',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public static function catalogOrdered()
    {
        return static::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name');
    }

    public function imageBottleUrl(): string
    {
        return $this->resolveImageUrl($this->attributes['image_bottle'] ?? null);
    }

    public function imageBackgroundUrl(): string
    {
        return $this->resolveImageUrl($this->attributes['image_background'] ?? null);
    }

    private function resolveImageUrl(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }

        $path = str_replace('\\', '/', $path);

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        if (str_starts_with($path, '/images/') || str_starts_with($path, '/storage/')) {
            return $path;
        }

        if (str_starts_with($path, 'images/')) {
            return '/'.$path;
        }

        if (Storage::disk('public')->exists($path)) {
            return '/storage/'.ltrim($path, '/');
        }

        return $path;
    }
}
