<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('our_channels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Our Channel');
            $table->text('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->json('content_blocks')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('our_channels');
    }
};
