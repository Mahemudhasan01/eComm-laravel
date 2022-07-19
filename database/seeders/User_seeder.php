<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // for ($i = 1; $i <= 1; $i++) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin')
            ]);
        // }
    }
}
