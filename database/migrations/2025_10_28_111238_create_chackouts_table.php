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
        Schema::create('chackouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable;
            $table->integer('phone');
            $table->mediumText('address')->nullable();
            $table->mediumText('shipping_address')->nullable();
            $table->string('country')->default('bangladesh');
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->float('amount')->default(0);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chackouts');
    }
};
