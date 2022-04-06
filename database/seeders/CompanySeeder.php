<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $usersId = $this->getRandomUserId();
        $faker = Factory::create();

       Company::create([
            'user_id' => $usersId,
            'title' => $faker->title,
            'phone' => $faker->phoneNumber,
            'description' => $faker->text,
       ]);
    }

    private function getRandomUserId()
    {
        return User::all(['id'])->random(1)
            ->pluck('id')
            ->toArray()[0];
    }
}
