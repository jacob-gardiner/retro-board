<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/boards/{board}/invite', \App\Http\Controllers\ShowBoardInviteController::class)->name('boards.invite.show')->middleware('signed');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->scopeBindings()->group(function () {
    Route::resource('boards', \App\Http\Controllers\BoardController::class)->only(['index', 'show', 'store', 'update']);
    Route::resource('boards.columns', \App\Http\Controllers\BoardColumnController::class)->only(['store', 'update']);
    Route::resource('boards.columns.cards', \App\Http\Controllers\BoardColumnCardController::class)->only(['store', 'update', 'destroy']);
    Route::resource('cards.votes', \App\Http\Controllers\CardVoteController::class)->only(['store']);
});
