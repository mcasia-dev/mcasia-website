<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoMeta extends Model
{
    protected $fillable = [
        // Essential
        'title',
        'meta_description',
        'canonical_url',

        // Open Graph
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'og_locale',

        // Twitter
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_site',

        // Robots
        'is_indexed',
        'is_followed',

        // Schema
        'schema_type',
        'schema_data',

        // Extra
        'keywords',
        'author',
        'publisher',
        'extra_meta',
    ];

    protected $casts = [
        'is_indexed' => 'boolean',
        'is_followed' => 'boolean',
        'schema_data' => 'array',
        'extra_meta' => 'array',
    ];

    /**
     * The owning model (OurStory, SalesAvenue, OurEdge, etc.)
     */
    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Generate the robots meta tag value from booleans.
     * Example: "index, follow" or "noindex, nofollow"
     */
    public function getRobotsAttribute(): string
    {
        $index = $this->is_indexed ? 'index' : 'noindex';
        $follow = $this->is_followed ? 'follow' : 'nofollow';

        return "{$index}, {$follow}";
    }

    /**
     * Generate full JSON-LD script tag for Schema.org.
     */
    public function getSchemaScriptAttribute(): ?string
    {
        if (!$this->schema_type || !$this->schema_data) {
            return null;
        }

        $schema = array_merge(
            ['@context' => 'https://schema.org', '@type' => $this->schema_type],
            $this->schema_data
        );

        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}
