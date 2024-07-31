<?php

namespace Tests\Feature\BoardColumn;

use App\Models\Board;
use App\Models\Team;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreBoardColumnControllerTest extends TestCase
{
    #[Test]
    public function it_can_create_a_new_column()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()->create([
            'team_id' => $user->current_team_id,
        ]);

        $expected = [
            'title' => 'Some sweet column',
            'board_id' => $board->id,
        ];

        $this->actingAs($user)
            ->postJson(route('boards.columns.store', [
                'board' => $board->id,
            ]), ['title' => $expected['title']])
            ->assertOk();

        $this->assertDatabaseHas('columns', $expected);
    }

    #[Test]
    public function it_requires_a_valid_title(): void
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()->create([
            'team_id' => $user->current_team_id,
        ]);

        $this->actingAs($user)
            ->post(route('boards.columns.store', $board))
            ->assertRedirect()
            ->assertSessionHasErrors(['title']);

        $this->assertDatabaseMissing('columns', ['board_id' => $board->id]);
    }

    #[Test]
    public function it_does_not_allow_users_who_do_not_have_permission_to_update_the_board_create_a_column()
    {
        $user = User::factory()->create();
        $team = Team::factory()->create();
        $board = Board::factory()->create([
            'team_id' => $team->id,
        ]);
        $expected = [
            'title' => 'Some sweet retro',
        ];

        $this->actingAs($user)
            ->post(route('boards.columns.store', $board), $expected)
            ->assertNotFound();

        $this->assertDatabaseMissing('columns', $expected);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $team = Team::factory()->create();
        $board = Board::factory()->create([
            'team_id' => $team->id,
        ]);
        $expected = [
            'title' => 'Some sweet retro',
        ];

        $this->post(route('boards.columns.store', $board), $expected)
            ->assertRedirectToRoute('login');

        $this->assertDatabaseMissing('columns', $expected);
    }
}
