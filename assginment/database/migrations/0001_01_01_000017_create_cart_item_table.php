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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('row_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_variant_id');
            $table->integer('quantity')->default(1);
            $table->integer('price');
            $table->timestamps();

            // 🔗 Foreign keys
            $table->foreign('cart_id')->references('row_id')->on('carts')->onDelete('cascade');
            $table->foreign('product_variant_id')->references('row_id')->on('product_variants')->onDelete('cascade');

            // 🔒 Đảm bảo không trùng sản phẩm trong cùng giỏ
            $table->unique(['cart_id', 'product_variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
