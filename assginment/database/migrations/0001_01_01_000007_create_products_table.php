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
        Schema::create('products', function (Blueprint $table) {
            $table->id('row_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->text('tag');
            $table->string('type'); 

            $table->foreignId('publisher_id')
                ->nullable()
                ->constrained('publishers', 'row_id')
                ->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
