<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
      public function run(): void
    {
        Product::create([
            'user_id' => 2,
            'name' => 'Maíz',
            'description' => 'Maíz de alta calidad',
            'price' => 200,
            'quantity' => 100,
            'location' => 'Chihuahua'
        ]);

        Product::create([
            'user_id' => 2,
            'name' => 'Frijol',
            'description' => 'Frijol orgánico',
            'price' => 150,
            'quantity' => 80,
            'location' => 'Sonora'
        ]);

        Product::create([
            'user_id' => 2,
            'name' => 'Trigo',
            'description' => 'Trigo premium',
            'price' => 180,
            'quantity' => 120,
            'location' => 'Durango'
        ]);
    }
}
