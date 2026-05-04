<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
