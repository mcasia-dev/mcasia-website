<?php

namespace App\Models\PublicPage;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OurStory extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'content',
        'timeline_items',
        'is_published'
    ];

    protected $casts = [
        'timeline_items' => 'array',
        'is_published' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('our-story-image')->singleFile();
    }

    public function scopeIsPublished(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_published', true);
    }
}
