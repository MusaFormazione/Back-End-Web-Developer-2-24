<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'prezzo' => 5.0,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Capricciosa',
                'prezzo' => 12.99,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Quattro Stagioni',
                'prezzo' => 11.99,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Diavola',
                'prezzo' => 1.0,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Funghi e Prosciutto',
                'prezzo' => 12.49,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Vegetariana',
                'prezzo' => 11.49,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Tonno e Cipolla',
                'prezzo' => 12.99,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Salsiccia e Friarielli',
                'prezzo' => 13.99,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pizzas')->insert($pizzas);
    }
}
