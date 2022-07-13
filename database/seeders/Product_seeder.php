<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 3; $i++) {
            DB::table('products')->insert([
                "name" => $faker->name,
                "price" => $faker->numberBetween(1500, 10000),
                "category" => $faker->name,
                "gallery" => "1.png",
                "description" => $faker->paragraph(),
            ]);
        }
    }
}
