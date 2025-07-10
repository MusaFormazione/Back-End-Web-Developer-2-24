<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $todos = [
            [
                'title' => 'Buy groceries',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Walk the dog',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Read a book',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Exercise',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Clean the house',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Finish homework',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Call mom',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Prepare dinner',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('todos')->insert($todos);

    }
}
