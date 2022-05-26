<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();

        #$faker = \Faker\Factory::create();
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            $v = $faker->vehicleArray();
            Car::create([
                'brand' => $v['brand'],
                'model' => $v['model'],
                'in_used' => $faker->boolean
            ]);
        }
    }
}
