<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OurImpact extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'content_blocks',
        'is_published',
    ];

    protected $casts = [
        'content_blocks' => 'array',
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('our-impact-banner')->singleFile();
    }

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
