<?php

namespace Models;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserTest extends TestCase
{
    #[Test]
    public function it_sets_a_random_default_color_when_creating_a_user(): void
    {
        $user = User::create([
            'name' => 'Morty Smith',
            'email' => 'morty.smith@gmail.com',
            'password' => 'password',
        ]);

        $this->assertTrue(collect(config('retro.colors'))->contains($user->color));
    }
}
