<?php

namespace App\Http\Controllers;

use App\Events\CardCreated;
use App\Http\Requests\Cards\StoreCardRequest;
use App\Http\Requests\Cards\UpdateCardRequest;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Support\Facades\Gate;

class BoardColumnCardController extends Controller
{
    public function store(StoreCardRequest $request, Board $board, Column $column)
    {
        Gate::authorize('update', $board);

        Card::create([
            'board_id' => $board->id,
            'column_id' => $column->id,
            'user_id' => auth()->id(),
            'text' => $request->validated('text'),
        ]);

        CardCreated::dispatch($board);
    }

    public function update(UpdateCardRequest $request,Board $board, Column $column, Card $card)
    {
        $column = Column::findOrFail($request->validated('column_id'));

        $card->update([
            'column_id' => $request->validated('column_id'),
        ]);

        CardCreated::dispatch($column->board); // TODO: create CardUpdated event
    }
}
