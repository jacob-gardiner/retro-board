<?php

namespace BoardColumn;

use App\Models\Board;
use App\Models\Team;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateBoardColumnControllerTest extends TestCase
{
    public string $route = 'boards.columns.update';

    #[Test]
    public function it_can_update_an_existing_column_title()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()->hasColumns()->create([
            'team_id' => $user->current_team_id,
        ]);
        $column = $board->columns->first();

        $expected = [
            'id' => $column->id,
            'board_id' => $board->id,
            'title' => 'Some sweet updated column',
        ];

        $this->actingAs($user)
            ->put(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
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
        $board = Board::factory()->hasColumns()->create([
            'team_id' => $user->current_team_id,
        ]);
        $column = $board->columns->first();

        $this->actingAs($user)
            ->put(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
            ]), ['title' => 'a'])
            ->assertRedirect()
            ->assertSessionHasErrors(['title']);

        $this->assertDatabaseHas('columns', [
            'id' => $column->id,
            'title' => $column->title,
        ]);
    }

    #[Test]
    public function it_does_not_allow_users_who_do_not_have_permission_to_update_the_board_update_a_column()
    {
        $user = User::factory()->create();
        $team = Team::factory()->create();
        $board = Board::factory()->hasColumns()->create([
            'team_id' => $team->id,
        ]);
        $column = $board->columns->first();

        $expected = [
            'title' => 'Some sweet column',
        ];

        $this->actingAs($user)
            ->put(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
            ]), $expected)
            ->assertNotFound();

        $this->assertDatabaseMissing('columns', $expected);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $team = Team::factory()->create();
        $board = Board::factory()->hasColumns()->create([
            'team_id' => $team->id,
        ]);
        $column = $board->columns->first();
        $expected = [
            'title' => 'Some sweet retro',
        ];

        $this->put(route($this->route, [
            'board' => $board->id,
            'column' => $column->id,
        ]), $expected)
            ->assertRedirectToRoute('login');

        $this->assertDatabaseMissing('columns', $expected);
    }
}
