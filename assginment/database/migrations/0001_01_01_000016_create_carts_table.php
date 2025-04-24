<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('row_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('session_id')->nullable()->index(); // cho guest
            $table->timestamps();

            $table->foreign('user_id')
                ->references('row_id')->on('users')
                ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('carts');
    }
    
};
