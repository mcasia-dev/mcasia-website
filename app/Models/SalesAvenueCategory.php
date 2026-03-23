<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalesAvenueCategory extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'level',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopePageBySlug(Builder $query, string $slug)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('slug', $slug);

    }

    public function scopeIsActive(Builder $query)
    {
        if (!$query) {
            return $query;
        }

        return $query->where('is_active', true);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    public function salesAvenues(): BelongsToMany
    {
        return $this->belongsToMany(SalesAvenue::class, 'sales_avenue_sales_avenue_category')
            ->withPivot('is_primary')
            ->withTimestamps();
    }
}
