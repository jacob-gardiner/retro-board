<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user): void
    {
        $user->color = collect(config('retro.colors'))->random();
    }
}
