<?php

namespace Boards;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use App\Models\Vote;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowBoardControllerTest extends TestCase
{
    #[Test]
    public function it_passes_the_expected_board()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $board = $user->currentTeam->boards->first();
        $this->actingAs($user)
            ->get(route('boards.show', $board))
            ->assertInertia(fn (AssertableInertia $page) => $page
                ->component('Boards/BoardView')
                ->has('board', fn (AssertableInertia $page) => $page
                    ->where('id', $board->id)
                    ->etc()
                )
            );
    }

    #[Test]
    public function it_loads_expected_relationships()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->has(
            Board::factory()->has(
                Column::factory()->has(
                    Card::factory()->has(
                        Vote::factory()
                    )
                )
            )
        ))->create();

        $board = $user->currentTeam->boards->first();

        $this->actingAs($user)
            ->get(route('boards.show', $board))
            ->assertInertia(fn (AssertableInertia $page) => $page
                ->component('Boards/BoardView')
                ->has('board', fn (AssertableInertia $page) => $page
                    ->where('id', $board->id)
                    ->has('columns.0.cards.0.votes')
                    ->has('columns.0.cards.0.user')
                    ->etc()
                )
            );
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $board = $user->currentTeam->boards->first();

        $this->get(route('boards.show', $board))
            ->assertRedirectToRoute('login');
    }

    #[Test]
    public function it_is_inaccessible_to_users_from_other_teams()
    {
        $user = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $currentUser = User::factory()->withPersonalTeam(fn ($team) => $team->hasBoards(1))->create();
        $board = $user->currentTeam->boards->first();

        $this->actingAs($currentUser)
            ->get(route('boards.show', $board))
            ->assertNotFound();
    }
}
