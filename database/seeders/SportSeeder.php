<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Sport::factory()->create(['name' => "Basketball"]);
        Sport::factory()->create(['name' => "Football"]);
        Sport::factory()->create(['name' => "Volleyball"]);
    }
}
