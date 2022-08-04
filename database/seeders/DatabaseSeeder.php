<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	 $faker = \Faker\Factory::create();

 for ($i=0; $i < 30; $i++) { 

         DB::table('client')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
             'email' => $faker->safeEmail(),
            'passport_num' =>$faker->numberBetween(15515454, 55515454),
            'gender' => $faker->randomElement(["male", "female", "others"]),
        ]);

     }


      for ($i=0; $i < 50; $i++) { 

         DB::table('product')->insert([
            'title' => $faker->name(),
            'type' =>  $faker->randomElement(["Excursions", "Custom Packages", "Cruises", "Transfers"]),
             'description' => $faker->sentence(),
            'capacity' =>$faker->numberBetween(5, 10),
            
        ]);

     }


    }
}
