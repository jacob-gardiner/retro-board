<?php

namespace App\Http\Controllers;

use App\Http\Requests\Boards\CreateBoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Nette\NotImplementedException;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Boards/BoardList', [
            'boards' => BoardResource::collection(auth()->user()->currentTeam->boards)->toArray(request())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        throw new NotImplementedException();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBoardRequest $request)
    {
        Board::create([
            'title' => $request->validated('title'),
            'team_id' => auth()->user()->currentTeam->id,
            'created_by' => auth()->id()
        ]);

        return to_route('boards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        Gate::authorize('view', $board);

        return Inertia::render('Boards/BoardView', [
            'board' => BoardResource::make($board)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        throw new NotImplementedException();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        throw new NotImplementedException();
    }
}
