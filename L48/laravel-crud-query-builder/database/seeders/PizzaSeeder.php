<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = [
            [
                'gusto' => 'Margherita',
                'prezzo' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Marinara',
                'prezzo' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Capricciosa',
                'prezzo' => 7,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Diavola',
                'prezzo' => 1,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Quattro Stagioni',
                'prezzo' => 8,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Hawaii',
                'prezzo' => 800,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];


        DB::table('pizzas')->insert($pizzas);
    }
}
