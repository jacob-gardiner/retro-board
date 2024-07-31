<?php

namespace Tests\Feature\Boards;

use App\Models\User;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class IndexBoardControllerTest extends TestCase
{
    #[Test]
    public function it_only_passes_boards_belonging_to_the_current_team(): void
    {
        $user = User::factory()->withPersonalTeam(fn ($thing) => $thing->hasBoards(3))->create();
        User::factory()->withPersonalTeam(fn ($thing) => $thing->hasBoards(3))->create();

        $this->actingAs($user)
            ->get(route('boards.index'))
            ->assertInertia(fn (AssertableInertia $page) => $page
                ->component('Boards/BoardList')
                ->has('boards', 3, fn (AssertableInertia $page) => $page
                    ->where('team_id', $user->personalTeam()->id)
                    ->etc()
                )
            );
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $this->get(route('boards.index'))->assertRedirectToRoute('login');
    }
}
