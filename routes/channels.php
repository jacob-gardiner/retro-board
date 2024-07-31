<?php

use App\Models\Board;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('boards.{boardId}', function ($user, $boardId) {
    $board = Board::findOrFail($boardId);

    return $user->current_team_id === $board->team_id;
});
