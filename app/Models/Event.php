<?php

namespace App\Models;

use App\Models\Concerns\ResolvesPublicStorageUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use ResolvesPublicStorageUrl;

    protected $guarded = [];

    public function imageStorageUrl(): ?string
    {
        return $this->publicDiskUrl($this->attributes['image_url'] ?? null);
    }

    public function reviews()
    {
        return $this->hasMany(EventReview::class);
    }

    public function publicUrl(): string
    {
        return route('events.show', $this->slug, absolute: true);
    }

    /** URL absoluta para Open Graph / Twitter Cards (imagen o logo). */
    public function absoluteShareImageUrl(): string
    {
        $u = $this->imageStorageUrl();
        if ($u === null || $u === '') {
            return url('/images/Logo Dorado.png');
        }
        if (str_starts_with($u, 'http://') || str_starts_with($u, 'https://')) {
            return $u;
        }

        return url($u);
    }

    public function shareDescriptionExcerpt(int $max = 160): string
    {
        $plain = preg_replace('/\s+/', ' ', strip_tags((string) $this->description));

        return Str::limit(trim($plain), $max, '…');
    }

    /**
     * Enlace a Google Maps: URL guardada en admin o búsqueda por texto de ubicación.
     */
    public function resolvedMapsUrl(): string
    {
        $raw = trim((string) ($this->maps_url ?? ''));
        if ($raw !== '' && filter_var($raw, FILTER_VALIDATE_URL)) {
            return $raw;
        }

        return 'https://www.google.com/maps/search/?api=1&query='.rawurlencode((string) $this->location);
    }
}
