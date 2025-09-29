<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i <= 30; $i++){
            Product::create([
                'name' => "Product $i",
                'Description' => "Description product $i",
                'price' => rand(10, 1000)
            ]);
        }
    }
}
