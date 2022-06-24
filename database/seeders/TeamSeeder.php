<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory()
            ->count(20)
            ->create()
            ->each(function ($team) {
                Player::factory()
                    ->count(11)
                    ->create([
                        'team_id' => $team,
                    ]);
            });
    }
}
