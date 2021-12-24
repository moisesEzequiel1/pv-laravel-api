<?php

use Illuminate\Database\Seeder;
use App\Orders;

class OrdersSeeder extends Seeder
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
             Orders::create([
                'user' => $faker->numberBetween($int1=1, $int2=50),
                'costumer' => $faker->numberBetween($int1=1, $int2=50),
                'sub_total' => $faker->numberBetween($int1=1, $int2=1999),
                'discount' => $faker->numberBetween($int1=1, $int2=100),
                'iva' => $faker->numberBetween($int1=1, $int2=1999),
                'total' => $faker->numberBetween($int1=1, $int2=1999),
            ]);
    }
}
}
