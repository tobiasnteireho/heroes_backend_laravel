<?php

use Illuminate\Database\Seeder;
use App\Hero;

class HeroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Hero::truncate();
        $faker = \Faker\Factory::create();

        //lets make 50 regular heroes
        for($i =0; $i < 50; $i++){
          Hero::create([
            'name' => $faker->firstName
          ]);
        }
    }
}
