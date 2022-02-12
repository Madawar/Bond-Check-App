<?php

namespace Database\Seeders;

use App\Models\BondCheck;
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
        // \App\Models\User::factory(10)->create();
        $x = ['Emirates', 'Astral Aviation', 'Lufthansa', 'Saudia Cargo'];
        foreach ($x as $key => $value) {
            \App\Models\Airline::factory()->has(BondCheck::factory()->count(rand(30, 60)), 'bondchecks')->create(['airline_name' => $value]);
        }
    }
}
