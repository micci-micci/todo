<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::post('/todo/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::patch('/todo/update', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/todo/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy');
