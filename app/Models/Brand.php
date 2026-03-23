<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'brand_name',
        'slug',
        'brand_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brand-logo')->singleFile();
        $this->addMediaCollection('brand-banner')->singleFile();
    }

    public function scopeIsActive(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_active', true);
    }

    public function scopeBrandBySlug(Builder $query, string $slug)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('slug', $slug);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
