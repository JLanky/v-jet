<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::create([
           'first_name' => $faker->firstName,
           'last_name' => $faker->lastName,
           'email' => $faker->email,
           'password' => Hash::make($faker->password),
           'phone' => $faker->phoneNumber,
        ]);
    }
}
