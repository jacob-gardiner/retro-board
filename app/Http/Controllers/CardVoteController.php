<?php

namespace App\Http\Controllers;

use App\Events\VoteCreated;
use App\Models\Card;
use App\Models\Vote;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CardVoteController extends Controller
{
    public function store(Card $card)
    {
        Gate::authorize('update', $card->board);

        Vote::create([
            'card_id' => $card->id,
            'user_id' => auth()->id(),
        ]);

        VoteCreated::dispatch($card->board);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
