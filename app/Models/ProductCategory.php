<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductCategory extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSeo;

    protected $table = 'product_categories';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'level',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category-icons')->singleFile();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_product_category')
            ->withPivot('is_primary')
            ->withTimestamps();
    }
}
