<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Laravel\Prompts\Task;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);

/* Route::get('/test-raw', function() {
    $results = DB::select('SELECT * FROM tasks WHERE priority = ?', [2]);
    return $results;
}); */

Route::get('/test-transaction', function() {
    DB::transaction(function() {
        DB::table('tasks')->insert([
            'title' => 'going to New York',
            'done' => 0,
            'priority' => 1,
        ]);

        DB::table('categories')->where('id', 1)->update([
            'name' => 'Lorem ipsum',
        ]);
    });

    return "Transaction completed";
});