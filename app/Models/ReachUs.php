<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ReachUs extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('reach-us-banner')->singleFile();
    }

    public function scopeIsPublished(Builder $query)
    {
        if (! $query) {
            return $query;
        }

        return $query->where('is_published', true);
    }
}
