<?php

namespace App\Models\PublicPage;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Recipe extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $fillable = [
        'recipe_name',
        'slug',
        'description',
        'ingredients',
        'instructions',
        'is_published',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('recipe-image')->singleFile();
        $this->addMediaCollection('recipe-video')->singleFile();
    }

    public function scopeIsPublished(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_published', true);
    }
}
