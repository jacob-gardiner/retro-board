<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoardPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Board $board): Response
    {
        return $user->current_team_id === $board->team_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Board $board): bool
    {
        return true;
    }

    public function delete(User $user, Board $board): bool
    {
        return true;
    }

    public function restore(User $user, Board $board): bool
    {
        return true;
    }

    public function forceDelete(User $user, Board $board): bool
    {
        return true;
    }
}
