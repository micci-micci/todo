<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');
