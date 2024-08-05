<?php

namespace App\Http\Controllers;

use App\Http\Requests\Boards\StoreBoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Nette\NotImplementedException;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards/BoardList', [
            'boards' => BoardResource::collection(auth()->user()->currentTeam->boards)->toArray(request()),
        ]);
    }

    public function create()
    {
        throw new NotImplementedException;
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

        $board->load('columns.cards.user');

        return Inertia::render('Boards/BoardView', [
            'board' => BoardResource::make($board),
        ]);
    }

    public function edit(string $id)
    {
        throw new NotImplementedException;
    }

    public function update(Request $request, string $id)
    {
        throw new NotImplementedException;
    }

    public function destroy(string $id)
    {
        throw new NotImplementedException;
    }
}
