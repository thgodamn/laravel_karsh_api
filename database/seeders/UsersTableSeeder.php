<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();
        $password = Hash::make('toptal');

        $cars = Car::pluck('id')->toArray();
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
            'api_token' => 'arJ5IXvdfCUL6DDHGfxnD68jEblbhDKemALVwjRQoYCv8FUplw37gMIlDsPG',
            'car_id' => $cars[0],
        ]);


        for ($i = 0; $i < 2; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'api_token' => $faker->regexify('[A-Za-z0-9]{60}'),
                'car_id' => $cars[$i+1],
                #'password' => Hash::make($faker->password),
            ]);
        }
    }
}
