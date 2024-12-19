<?php

namespace Database\Seeders;

use App\Models\ComboPlan;
use App\Models\EligibilityCriteria;
use App\Models\Plan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Plan::factory(1000)->create();
        ComboPlan::factory(1000)->create();
        EligibilityCriteria::factory(1000)->create();
    }
}
