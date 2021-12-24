<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();



        for ($i = 0; $i < 10; $i++) {
             User::create([
                'name' => $faker->name,
                'unit_price' => $faker->numberBetween($int1=1, $int2=99999),
                'items_available' => $faker->numberBetween($int1=1, $int2=99999),
                'unit_price' => $faker->numberBetween($int1=1, $int2=99999),
            ]);
        }
    }
}
