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
            $table->id();
            $table->string('title', 50);
            $table->string('description', 500);
            $table->string('included', 500);
            $table->string('feature1', 500);
            $table->string('feature2', 500)->nullable();
            $table->string('feature3', 500)->nullable();
            $table->string('feature4', 500)->nullable();
            $table->string('feature5', 500)->nullable();
            $table->string('feature6', 500)->nullable();
            $table->float('price');
            $table->integer('quantity');
            $table->string('img_url1');
            $table->string('img_url2')->nullable();
            $table->string('img_url3')->nullable();
            $table->string('img_url4')->nullable();
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
