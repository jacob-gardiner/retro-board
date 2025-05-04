<?php

namespace Boards;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateBoardControllerTest extends TestCase
{
    #[Test]
    public function it_can_update_a_board()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $board = $user->currentTeam->boards->first();

        $expected = [
            'title' => 'Some sweet retro',
            'timer_started_at' => now()->toDateString(),
            'timer_duration' => 250,
            'timer_duration_remaining' => 250,
        ];
        $this->actingAs($user)
            ->put(route('boards.update', $board), $expected)
            ->assertOk();

        $this->assertDatabaseHas('boards', [
            ...$expected,
            'id' => $board->id,
        ]);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $board = $user->currentTeam->boards->first();

        $expected = [
            'title' => 'Some sweet retro',
        ];

        $this->put(route('boards.update', $board), $expected)
            ->assertRedirectToRoute('login');

        $this->assertDatabaseMissing('boards', $expected);
    }
}
