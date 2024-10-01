<?php

use App\Models\Product;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $products = Product::all();

            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->datetime("date");
            $table->text("address");
            $table->integer("quantity_product1");
            $table->integer("quantity_product2");
            $table->integer("quantity_product3");
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
