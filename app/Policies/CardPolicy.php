<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CardPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Card $card): Response
    {
        return $user->id === $card->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
