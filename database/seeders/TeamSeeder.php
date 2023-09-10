<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sport = Sport::factory()->create(['name' => "Basketball 3x3"]);

        $team1Players = User::factory()->count(3);
        $team2Players = User::factory()->count(3);

        Team::factory()->for($sport)->hasAttached($team1Players, [])->create();
        Team::factory()->for($sport)->hasAttached($team2Players, [])->create();
    }
}
