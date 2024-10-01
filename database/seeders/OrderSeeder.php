<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->user_id = 1;
        $order->quantity_product1 = 2;
        $order->quantity_product2 = 1;
        $order->quantity_product3 = 3;
        $order->date = "2024-04-29 14:33:22";
        $order->address = "7 rue test";
        $order->save();
    }
}
