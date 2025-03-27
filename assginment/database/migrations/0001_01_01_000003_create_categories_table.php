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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('row_id');  
            $table->string('name');
            $table->boolean('is_active')->default(true);  
            $table->softDeletes();
            $table->text('tag')->nullable(); 
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->foreign('parent_id')->references('row_id')->on('categories')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
