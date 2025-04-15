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
        Schema::create('blog', function (Blueprint $table) {
            $table->id('row_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longtext('content');
            $table->string('thumbnail');
            $table->boolean('is_active');
            $table->dateTime('published_at')->nullable();
            $table->string('describe');
            $table->string('author');
            $table->softDeletes();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories_blog', 'row_id')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
