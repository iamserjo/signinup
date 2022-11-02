<?php

namespace Database\Seeders;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
            ->count(10)
            ->hasCompany(3)
            ->create();
    }
}
