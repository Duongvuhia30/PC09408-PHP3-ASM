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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id('row_id');
            $table->foreignId('product_id')->constrained('products', 'row_id')->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('type')->nullable();
            $table->string('pdf')->nullable();
            $table->string('image')->nullable(); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
