<?php

namespace App\Models\PublicPage;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'sort_no',
        'is_published',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('event-images');
    }

    public function scopeIsPublished(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_published', true);
    }
}
