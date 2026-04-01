<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SalesAvenue extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $fillable = [
        'title',
        'content',
        'is_published',
        'grid_no',
        'image_field_type',
        'image_links',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'image_links' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('sales-avenue-banner');
        $this->addMediaCollection('sales-avenue-images');
    }

    public function scopeIsPublished(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_published', true);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(SalesAvenueCategory::class, 'sales_avenue_sales_avenue_category')
            ->withPivot('is_primary')
            ->withTimestamps();
    }
}
