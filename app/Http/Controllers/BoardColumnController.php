<?php

namespace App\Http\Controllers;

use App\Events\ColumnCreated;
use App\Http\Requests\Columns\StoreColumnRequest;
use App\Models\Board;
use App\Models\Column;
use Illuminate\Support\Facades\Gate;

class BoardColumnController extends Controller
{
    public function store(StoreColumnRequest $request, Board $board)
    {
        Gate::authorize('update', $board);

        Column::create([
            'board_id' => $board->id,
            'title' => $request->validated('title'),
        ]);

        ColumnCreated::dispatch($board);
    }
}