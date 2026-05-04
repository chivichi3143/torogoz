<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
    public const CATEGORY_CERVEZAS = 'cervezas';

    public const CATEGORY_EVENTOS = 'eventos';

    public const CATEGORY_CULTURA = 'cultura';

    /** @return array<string, string> */
    public static function categoryLabels(): array
    {
        return [
            self::CATEGORY_CERVEZAS => 'Cervezas',
            self::CATEGORY_EVENTOS => 'Eventos',
            self::CATEGORY_CULTURA => 'Cultura',
        ];
    }

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function imageUrl(): ?string
    {
        $path = $this->attributes['image_path'] ?? null;
        if ($path === null || $path === '') {
            return null;
        }

        $path = str_replace('\\', '/', $path);

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        if (str_starts_with($path, '/')) {
            return $path;
        }

        if (Storage::disk('public')->exists($path)) {
            $relative = '/storage/'.ltrim($path, '/');
            if (! app()->runningInConsole() && request()->getHttpHost() !== '') {
                return request()->getScheme().'://'.request()->getHttpHost().$relative;
            }

            return $relative;
        }

        return '/storage/'.ltrim($path, '/');
    }

    /**
     * @return Collection<int, array{key: string, category: string, title: string, description: ?string, image_url: string}>
     */
    public static function publicTiles(): Collection
    {
        $manual = static::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (GalleryItem $g) {
                $url = $g->imageUrl();

                return [
                    'key' => 'gallery-'.$g->id,
                    'category' => $g->category,
                    'title' => $g->title,
                    'description' => $g->description,
                    'image_url' => $url ?? '',
                ];
            })
            ->filter(fn (array $row) => $row['image_url'] !== '');

        $reviews = EventReview::query()
            ->where('is_approved', true)
            ->whereNotNull('photo_path')
            ->where('photo_path', '!=', '')
            ->with('event')
            ->orderByDesc('created_at')
            ->get()
            ->map(function (EventReview $r) {
                $url = $r->photoStorageUrl();

                return [
                    'key' => 'review-'.$r->id,
                    'category' => self::CATEGORY_EVENTOS,
                    'title' => $r->event?->title ?? 'Evento',
                    'description' => self::formatReviewCaption($r),
                    'image_url' => $url ?? '',
                ];
            })
            ->filter(fn (array $row) => $row['image_url'] !== '');

        return $manual->concat($reviews)->values();
    }

    protected static function formatReviewCaption(EventReview $r): string
    {
        $parts = array_filter([$r->author_name, $r->comment]);

        return implode(' — ', $parts);
    }
}
