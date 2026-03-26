<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
   public function run(): void
    {
        Order::create([
            'buyer_id' => 3,
            'product_id' => 1,
            'quantity' => 10,
            'status' => 'pending'
        ]);

        Order::create([
            'buyer_id' => 3,
            'product_id' => 2,
            'quantity' => 5,
            'status' => 'completed'
        ]);
    }
}
