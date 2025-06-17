<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'user_name' => $faker->name,
                'user_email' => $faker->unique()->safeEmail,
                'user_password' => Hash::make('password'), // Default password
                'user_gender' => $faker->randomElement(['Male', 'Female']),
                'user_phone' => $faker->unique()->numerify('081#########'),
                'user_address' => $faker->address,
                'user_profile' => null,
                'user_role' => $faker->randomElement(['admin', 'user']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
