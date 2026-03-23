<?php

namespace App\Models\PublicPage;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'blocks',
        'is_published',
    ];

    protected $casts = [
        'blocks' => 'array',
        'is_published' => 'boolean',
    ];

    public function scopeIsPublished(Builder $query)
    {
        if (! $query) {
            return $query;
        }

        return $query->where('is_published', true);
    }
}

