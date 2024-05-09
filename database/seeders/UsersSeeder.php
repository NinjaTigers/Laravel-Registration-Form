<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'password'=> 'wael@123',
            'name'=> 'marcelo',
            'username'=> 'marcelo',
            'email'=> 'marcelo@gmail.com',
            'phone'=> '01555557288',
            'address'=> 'elmaadi',
            'birthdate'=>"2024-06-06",

        ]);
    }
}
