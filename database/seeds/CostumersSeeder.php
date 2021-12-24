<?php

use Illuminate\Database\Seeder;
use App\Costumers;

class CostumersSeeder extends Seeder
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



        for ($i = 0; $i < 50; $i++) {
             Costumers::create([
                'name' => $faker->name,
            ]);
        }
    }
}
