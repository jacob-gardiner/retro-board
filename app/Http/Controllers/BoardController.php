<?php

namespace App\Http\Controllers;

use App\Events\BoardUpdated;
use App\Http\Requests\Boards\StoreBoardRequest;
use App\Http\Requests\Boards\UpdateBoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards/BoardList', [
            'boards' => BoardResource::collection(auth()->user()->currentTeam->boards)->toArray(request()),
        ]);
    }

    public function store(StoreBoardRequest $request)
    {
        Board::create([
            'title' => $request->validated('title'),
            'team_id' => auth()->user()->currentTeam->id,
            'created_by' => auth()->id(),
        ]);

        return to_route('boards.index');
    }

    public function show(Board $board)
    {
        Gate::authorize('view', $board);

        $board->load(['columns.cards.user', 'columns.cards.votes']);

        return Inertia::render('Boards/BoardView', [
            'board' => BoardResource::make($board),
            'invite_link' => URL::signedRoute('boards.invite.show', ['board' => $board->id]),
        ]);
    }

    public function update(UpdateBoardRequest $request, Board $board)
    {
        Gate::authorize('update', $board);

        $board->update($request->validated());

        BoardUpdated::dispatch($board);
    }
}
