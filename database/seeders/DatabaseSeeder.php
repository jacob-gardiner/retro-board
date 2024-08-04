<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $owner = User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $team = Team::factory()->create([
            'user_id' => $owner->id,
        ]);

        $owner->update([
            'current_team_id' => $team->id,
        ]);
        $other = User::factory()->withPersonalTeam()->create([
            'name' => 'Other User',
            'email' => 'other@example.com',
            'current_team_id' => $team->id,
        ]);

        $team->users()->attach($owner->id, ['role' => 'admin']);
        $team->users()->attach($other->id, ['role' => 'editor']);
    }
}
