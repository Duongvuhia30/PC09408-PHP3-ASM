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
        Schema::create('image_product_variants', function (Blueprint $table) {
            $table->id('row_id');
            $table->unsignedBigInteger('product_id');
            $table->softDeletes();
            $table->foreign('product_id')->references('row_id')->on('products')->onDelete('cascade');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_product_variants');
    }
};
