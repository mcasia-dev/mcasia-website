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
        Schema::table('seo_metas', function (Blueprint $table) {
            $table->string('og_type')->default('website')->nullable()->change();         // website, article, product, etc.
            $table->string('og_locale')->default('en_PH')->nullable()->change();        // Language/region
            $table->string('twitter_card')->default('summary_large_image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_metas', function (Blueprint $table) {
            $table->string('og_type')->default('website');         // website, article, product, etc.
            $table->string('og_locale')->default('en_PH');        // Language/region
            $table->string('twitter_card')->default('summary_large_image');
        });
    }
};
