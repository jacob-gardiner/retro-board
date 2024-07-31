<?php

namespace Boards;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreBoardControllerTest extends TestCase
{
    #[Test]
    public function it_can_create_a_new_board()
    {
        $user = User::factory()->withPersonalTeam()->create();
        $expected = [
            'title' => 'Some sweet retro',
            'created_by' => $user->id,
            'team_id' => $user->currentTeam->id,
        ];

        $this->actingAs($user)
            ->postJson(route('boards.store'), ['title' => $expected['title']])
            ->assertRedirectToRoute('boards.index');

        $this->assertDatabaseHas('boards', $expected);
    }

    #[Test]
    public function it_requires_a_valid_title(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $this->actingAs($user)
            ->post(route('boards.store'))
            ->assertRedirect()
            ->assertSessionHasErrors(['title']);

        $this->assertDatabaseMissing('boards', ['created_by' => $user->id]);
    }

    #[Test]
    public function it_is_inaccessible_to_guests()
    {
        $expected = [
            'title' => 'Some sweet retro',
        ];

        $this->post(route('boards.store'), $expected)
            ->assertRedirectToRoute('login');

        $this->assertDatabaseMissing('boards', $expected);
    }
}
