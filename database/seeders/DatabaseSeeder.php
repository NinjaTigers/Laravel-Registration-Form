<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'password'=> 'rami@123',
            'name'=> 'ahmed',
            'username'=> 'kareem',
            'email'=> 'kareem@gmail.com',
            'phone'=> '01000444492',
            'address'=> 'elmaadi',
            'birthdate'=>"2024-06-06",

        ]);
    }
}
