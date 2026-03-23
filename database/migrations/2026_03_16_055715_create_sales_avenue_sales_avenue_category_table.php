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
        Schema::create('sales_avenue_sales_avenue_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_avenue_id')
                ->constrained(table: 'sales_avenues', indexName: 'sasac_sales_avenue_fk')
                ->cascadeOnDelete();
            $table->foreignId('sales_avenue_category_id')
                ->constrained(table: 'sales_avenue_categories', indexName: 'sasac_sales_avenue_category_fk')
                ->cascadeOnDelete();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->unique(['sales_avenue_id', 'sales_avenue_category_id'], 'sasac_sales_avenue_category_unique');
            $table->index(['sales_avenue_category_id', 'is_primary'], 'sasac_category_primary_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_avenue_sales_avenue_category');
    }
};
