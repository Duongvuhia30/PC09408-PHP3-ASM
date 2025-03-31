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
        Schema::create('product_metadatas', function (Blueprint $table) {
            $table->id('row_id');
            $table->foreignId('product_id')->constrained('products', 'row_id')->onDelete('cascade');
            $table->string('language')->nullable();
            $table->integer('publish_year')->nullable();
            $table->string('author')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_metadatas');
    }
};
