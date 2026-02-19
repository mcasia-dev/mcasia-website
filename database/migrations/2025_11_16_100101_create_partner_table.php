<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partnership_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('blk_no')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('subdivision')->nullable();
            $table->string('country');
            $table->string('zip_code');
            $table->string('mobile_number');
            $table->string('landline_number')->nullable();
            $table->string('business_name');
            $table->string('business_address');
            $table->string('business_number')->nullable();
            $table->string('business_website')->nullable();
            $table->string('business_email');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner');
    }
};
