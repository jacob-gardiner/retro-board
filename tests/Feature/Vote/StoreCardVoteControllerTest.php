<?php

namespace Tests\Feature\Vote;

use App\Events\CardUpdated;
use App\Events\VoteCreated;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreCardVoteControllerTest extends TestCase
{
    private string $route = 'cards.votes.store';

    #[Test]
    public function it_can_create_a_vote()
    {
        Event::fake();

        $team = Team::factory()->create();
        $user = User::factory()->create([
            'current_team_id' => $team->id,
        ]);
        $board = Board::factory()
            ->has(Column::factory())
            ->for($team)
            ->create([
                'team_id' => $team->id,
            ]);

        $column = $board->columns->first();
        $card = Card::factory()->for($user)->for($column)->for($board)->create();

        $this->actingAs($user)
            ->post(route($this->route, $card))
            ->assertOk();

        Event::assertDispatched(VoteCreated::class);

        $this->assertDatabaseHas('votes', [
            'card_id' => $card->id,
            'user_id' => $user->id,
        ]);
    }

    #[Test]
    public function it_does_not_allow_users_from_other_teams_vote()
    {
        $team = Team::factory()->create();
        $user = User::factory()->create();
        $board = Board::factory()
            ->has(Column::factory()->has(Card::factory()->for($user)))
            ->for($team)
            ->create();
        $column = $board->columns->first();
        $card = $column->cards->first();

        $this->actingAs($user)
            ->post(route($this->route, $card))
            ->assertNotFound();

        $this->assertDatabaseEmpty('votes');
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        Event::fake();

        $team = Team::factory()->create();
        $board = Board::factory()
            ->has(Column::factory()->has(Card::factory()))
            ->for($team)
            ->create();
        $column = $board->columns->first();
        $card = $column->cards->first();

        $this->post(route($this->route, $card))
            ->assertRedirectToRoute('login');

        Event::assertNotDispatched(CardUpdated::class);

        $this->assertDatabaseEmpty('votes');
    }
}
