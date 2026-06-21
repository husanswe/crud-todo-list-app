<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Laravel\Prompts\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);