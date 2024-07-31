<?php

namespace Tests\Feature\BoardColumnCard;

use App\Models\Board;
use App\Models\Team;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreBoardColumnCardControllerTest extends TestCase
{
    private string $route = 'boards.columns.cards.store';

    #[Test]
    public function it_can_create_a_new_card()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->hasColumns()
            ->create([
                'team_id' => $user->current_team_id,
            ]);
        $column = $board->columns->first();
        $expected = [
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
        ];

        $this->actingAs($user)
            ->post(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
            ]), ['text' => $expected['text']])
            ->assertOk();

        $this->assertDatabaseHas('cards', $expected);
    }

    #[Test]
    public function it_requires_valid_text(): void
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->hasColumns()
            ->create([
                'team_id' => $user->current_team_id,
            ]);
        $column = $board->columns->first();
        $expected = [
            'text' => 'a',
            'board_id' => $board->id,
            'column_id' => $column->id,
        ];

        $this->actingAs($user)
            ->post(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
            ]), ['text' => $expected['text']])
            ->assertRedirect()
            ->assertSessionHasErrors(['text']);

        $this->assertDatabaseMissing('cards', $expected);
    }

    #[Test]
    public function it_does_not_allow_users_from_other_teams_to_create_a_card()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create([
        ]);
        $board = Board::factory()
            ->hasColumns()
            ->create([
                'team_id' => $team->id,
            ]);
        $column = $board->columns->first();
        $expected = [
            'text' => 'A happy little card',
        ];

        $this->actingAs($user)
            ->post(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
            ]), ['text' => $expected['text']])
            ->assertNotFound();

        $this->assertDatabaseMissing('cards', $expected);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $team = Team::factory()->create();
        $board = Board::factory()
            ->hasColumns()
            ->create([
                'team_id' => $team->id,
            ]);
        $column = $board->columns->first();
        $expected = [
            'text' => 'A happy little card',
        ];

        $this->post(route($this->route, [
            'board' => $board->id,
            'column' => $column->id,
        ]), ['text' => $expected['text']])
            ->assertRedirectToRoute('login');

        $this->assertDatabaseMissing('cards', $expected);
    }
}
