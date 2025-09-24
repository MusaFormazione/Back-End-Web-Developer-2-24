<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 1; $i <= 10; $i++){

            //genera un utente
            $user = User::create([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Str::random(10)
            ]);

            //genera un profilo ed associalo ad un utente
            Profile::create([
                'user_id' => $user->id,
                'bio' => "Bio for user $i",
                'address' => "Address $i"
            ]);

        }

    }
}
