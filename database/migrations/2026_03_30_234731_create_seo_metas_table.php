<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            // --- Polymorphic Relation ---
            // This allows ANY model (Post, Product, Page, etc.) to have SEO
            $table->morphs('seoable'); // creates seoable_id + seoable_type

            // --- Essential SEO Fields ---
            $table->string('title', 60)->nullable();               // 50-60 chars ideal
            $table->string('meta_description', 160)->nullable();   // 150-160 chars ideal
            $table->string('canonical_url')->nullable();           // Preferred URL for this page

            // --- Open Graph / Social Tags ---
            $table->string('og_title', 95)->nullable();            // Facebook, LinkedIn title
            $table->string('og_description', 200)->nullable();     // Social media description
            $table->string('og_image')->nullable();                // Image URL for social sharing
            $table->string('og_type')->default('website');         // website, article, product, etc.
            $table->string('og_locale')->default('en_PH');        // Language/region

            // --- Twitter / X Card ---
            $table->string('twitter_card')->default('summary_large_image'); // summary or summary_large_image
            $table->string('twitter_title', 70)->nullable();
            $table->string('twitter_description', 200)->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();

            // --- Robots / Indexing ---
            $table->boolean('is_indexed')->default(true);          // true = index, false = noindex
            $table->boolean('is_followed')->default(true);         // true = follow, false = nofollow
            // Combined robots meta tag will be generated from the two booleans above

            // --- Schema / JSON-LD ---
            $table->string('schema_type')->nullable();             // e.g. Article, Product, Organization
            $table->json('schema_data')->nullable();               // Flexible JSON-LD structured data

            // --- Additional Meta Tags ---
            $table->string('keywords')->nullable();                // Comma-separated (low priority in modern SEO)
            $table->string('author')->nullable();                  // Page/content author
            $table->json('extra_meta')->nullable();                // Any additional custom meta tags

            $table->timestamps();

            // Ensure one SEO record per model instance
            $table->unique(['seoable_id', 'seoable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metas');
    }
};
