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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Diavola',
                'prezzo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Vegetariana',
                'prezzo' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Capricciosa',
                'prezzo' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Quattro Stagioni',
                'prezzo' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('pizzas')->insert($pizzas);

    }
}
