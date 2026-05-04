<?php

namespace App\Models;

use App\Models\Concerns\ResolvesPublicStorageUrl;
use Illuminate\Database\Eloquent\Model;

class EventReview extends Model
{
    use ResolvesPublicStorageUrl;

    protected $guarded = [];

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
}
