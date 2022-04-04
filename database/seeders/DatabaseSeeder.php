<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Carrier;
use App\Models\Depot;
use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Package::factory(10)->create();
        Carrier::factory(10)->create();
        Address::factory(10)->create();
        Depot::factory(2)->create();
    }
}
