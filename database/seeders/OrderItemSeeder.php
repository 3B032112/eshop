<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::all()->each(function ($order) {
            OrderItem::factory(3)->create([
                'order_id' => $order->id,
                'product_id' => function () {
                    return Product::inRandomOrder()->first()->id;
                },
            ]);
        });
    }
}
