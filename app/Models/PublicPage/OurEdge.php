<?php

namespace App\Models\PublicPage;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OurEdge extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'sort_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('our-edge-image')->singleFile();
    }

    public function scopeIsPublished(Builder $query)
    {
        if (! $query) {
            return $query;
        }

        return $query->where('is_published', true);
    }

    public function scopePageBySlug(Builder $query, string $slug)
    {
        if (! $query) {
            return $query;
        }

        return $query->where('slug', $slug);
    }
}
