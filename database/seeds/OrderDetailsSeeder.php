<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;

class OrderDetailsSeeder extends Seeder
{
    public function run()
    {
        //
        $faker = \Faker\Factory::create();



        for ($i = 0; $i < 199; $i++) {
             OrderDetails::create([
                'order' => $faker->numberBetween($int1=1, $int2=9),
                'product' => $faker->numberBetween($int1=1, $int2=10),
                'unit_price' => $faker->numberBetween($int1=1, $int2=1999),
                'discount' => $faker->numberBetween($int1=1, $int2=100),
                'num_items' => $faker->numberBetween($int1=1, $int2=40),
                'iva' => $faker->numberBetween($int1=1, $int2=100),
                'total' => $faker->numberBetween($int1=1, $int2=1999),
            ]);
             
                      
    }
    }
}
