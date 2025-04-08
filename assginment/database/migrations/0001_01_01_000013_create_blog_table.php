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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->string('slug')->unique(); 
            $table->longtext('content'); 
            $table->string('thumbnail'); 
            $table->boolean('status');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('category_id')->constrained('categories_blog')->onDelete('cascade');  // Khóa ngoại tham chiếu bảng categories_blog
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
        
    }
};
