<?php

namespace BoardColumnCard;

use App\Events\CardDeleted;
use App\Models\Board;
use App\Models\Card;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DestroyBoardColumnCardControllerTest extends TestCase
{
    private string $route = 'boards.columns.cards.destroy';

    #[Test]
    public function it_can_soft_delete_a_card()
    {
        Carbon::setTestNow(now());
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
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
            ->deleteJson(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
                'card' => $card->id,
            ]))
            ->assertOk();

        Event::assertDispatched(CardDeleted::class);

        $this->assertDatabaseHas('cards', [
            'id' => $card->id,
            'deleted_at' => now()->toDateTimeString(),
        ]);
    }

    #[Test]
    public function it_does_not_allow_one_user_to_delete_another_users_card()
    {
        $team = Team::factory()->create();
        [$user, $otherUser] = User::factory()->count(2)->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->hasColumns(2)
            ->create([
                'team_id' => $team->id,
            ]);
        $column = $board->columns->first();
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $otherUser->id,
        ]);

        $this->actingAs($user)
            ->deleteJson(route($this->route, [
                'board' => $board->id,
                'column' => $column->id,
                'card' => $card->id,
            ]))
            ->assertNotFound();

        $this->assertDatabaseHas('cards', [
            'id' => $card->id,
            'deleted_at' => null,
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
            ->hasColumns()
            ->create([
                'team_id' => $user->current_team_id,
            ]);
        $column = $board->columns->first();
        $card = Card::factory()->create([
            'text' => 'A happy little card',
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => $user->id,
        ]);

        $this->deleteJson(route($this->route, [
            'board' => $board->id,
            'column' => $column->id,
            'card' => $card->id,
        ]))
            ->assertUnauthorized();

        Event::assertNotDispatched(CardDeleted::class);

        $this->assertDatabaseHas('cards', [
            'id' => $card->id,
            'deleted_at' => null,
        ]);
    }
}
