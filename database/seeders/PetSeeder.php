<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('pets')->insert([
                'name' => $faker->name,
                'status' => $faker->randomElement(config('enums.status')),
                'pawrent' => $faker->sentence,
                'breed' => $faker->randomElement(config('enums.breed')),
                'gender' => $faker->randomElement(config('enums.gender')),
                'contact' => $faker->phoneNumber,
                'address' => $faker->address,
                'dob' => $faker->date,
                'city' => $faker->randomElement(config('enums.city')),
                'township' => $faker->randomElement(config('enums.township')),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
