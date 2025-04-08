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
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('coupon_id');
            $table->string('discount_code', 10)->unique();
            $table->integer('type')->comment('0: fixed amount, 1: percentage');
            $table->integer('percent')->nullable();
            $table->integer('use_limit')->nullable();
            $table->integer('min_purchase')->nullable();
            $table->string('note', 255)->nullable();
            $table->date('time_start')->nullable();
            $table->date('time_end')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps(); // includes created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
