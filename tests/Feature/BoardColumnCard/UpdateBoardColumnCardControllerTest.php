<?php

namespace BoardColumnCard;

use App\Events\CardUpdated;
use App\Models\Board;
use App\Models\Card;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateBoardColumnCardControllerTest extends TestCase
{
    private string $route = 'boards.columns.cards.update';

    public function test_it_can_update_the_cards_column()
    {
        Event::fake();
        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->hasColumns(2)
            ->create([
                'team_id' => $user->current_team_id,
            ]);
        $column = $board->columns->first();
        $targetColumn = $board->columns->last();
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
            ->patchJson(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
                'card' => $card->id,
            ]), ['column_id' => $targetColumn->id])
            ->assertOk();

        Event::assertDispatched(CardUpdated::class);

        $this->assertDatabaseHas('cards', [
            'id' => $card->id,
            'column_id' => $targetColumn->id,
        ]);
    }

    #[Test]
    public function it_does_not_allow_users_from_other_teams_to_update()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create();
        $board = Board::factory()
            ->hasColumns(2)
            ->create([
                'team_id' => $team->id,
            ]);
        $column = $board->columns->first();
        $targetColumn = $board->columns->last();
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
            ->patchJson(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
                'card' => $card->id,
            ]), ['column_id' => $targetColumn->id])
            ->assertNotFound();

        $this->assertDatabaseMissing('cards', [
            'id' => $card->id,
            'column_id' => $targetColumn->id,
        ]);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        Event::fake();

        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->hasColumns(2)
            ->create([
                'team_id' => $user->current_team_id,
            ]);
        $column = $board->columns->first();
        $targetColumn = $board->columns->last();
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $user->id,
        ]);

        $this->patchJson(route($this->route, [
            'board' => $board->id,
            'column' => $column->id,
            'card' => $card->id,
        ]), ['column_id' => $targetColumn->id])
            ->assertUnauthorized();

        Event::assertNotDispatched(CardUpdated::class);

        $this->assertDatabaseMissing('cards', [
            'id' => $card->id,
            'column_id' => $targetColumn->id,
        ]);
    }
}
