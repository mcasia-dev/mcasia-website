<?php

namespace App\Traits;

use App\Models\SeoMeta;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * HasSeo Trait
 *
 * Add this trait to ANY model that needs SEO support.
 *
 * Usage:
 *   use App\Traits\HasSeo;
 *
 *   class Post extends Model {
 *       use HasSeo;
 *   }
 *
 * Then you can:
 *   $post->seo                          // Access SEO record
 *   $post->seo->title                   // Get SEO title
 *   $post->saveSeo([...])               // Save SEO data
 *   $post->getSeoTitle()                // With fallback to model title
 *   $post->getSeoDescription()          // With fallback to model excerpt
 */
trait HasSeo
{
    /**
     * Polymorphic relationship to SeoMeta.
     */
    public function seo(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    /**
     * Create or update SEO data for this model.
     *
     * @param array $data
     * @return SeoMeta
     */
    public function saveSeo(array $data): SeoMeta
    {
        return $this->seo()
            ->updateOrCreate(
                [
                    'seoable_id' => $this->id,
                    'seoable_type' => static::class,
                ],
                $data
            );
    }

    /**
     * Get SEO title with fallback to the model's own title/name field.
     *
     * @param string $fallbackField The model field to fall back to (default: 'title')
     * @return string|null
     */
    public function getSeoTitle(string $fallbackField = 'title'): ?string
    {
        return $this->seo?->title ?? $this->{$fallbackField} ?? null;
    }

    /**
     * Get SEO meta description with fallback to a model field.
     *
     * @param string $fallbackField The model field to fall back to (default: 'excerpt')
     * @return string|null
     */
    public function getSeoDescription(string $fallbackField = 'excerpt'): ?string
    {
        return $this->seo?->meta_description ?? $this->{$fallbackField} ?? null;
    }

    /**
     * Get OG image with fallback to a model field.
     *
     * @param string $fallbackField The model field to fall back to (default: 'image')
     * @return string|null
     */
    public function getSeoImage(string $fallbackField = 'image'): ?string
    {
        return $this->seo?->og_image ?? $this->{$fallbackField} ?? null;
    }

    /**
     * Check if this model has SEO data.
     */
    public function hasSeo(): bool
    {
        return $this->seo()->exists();
    }

    /**
     * Delete SEO data for this model.
     */
    public function deleteSeo(): void
    {
        $this->seo()->delete();
    }
}
