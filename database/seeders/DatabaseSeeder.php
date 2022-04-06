<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);

        for ($i = 0; $i < 10; $i++) {
            $this->call(UserSeeder::class);
        }

        for ($i = 0; $i < 100; $i++) {
            $this->call(CompanySeeder::class);
        }
    }
}
