<?php

namespace App\Http\Controllers;

use App\Events\ColumnCreated;
use App\Http\Requests\Columns\StoreColumnRequest;
use App\Http\Requests\Columns\UpdateColumnRequest;
use App\Models\Board;
use App\Models\Column;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

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

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(UpdateColumnRequest $request, Board $board, Column $column)
    {
        Gate::authorize('update', $board);

        $column->update([
            'title' => $request->title,
        ]);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
