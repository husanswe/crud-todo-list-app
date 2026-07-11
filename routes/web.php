<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () 
{    
    Route::resource('tasks', TaskController::class);
});

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

Route::get('/register-form', [RegisterController::class, 'show']);
Route::post('/register-form', [RegisterController::class, 'register']);

// File upload and working w/ files lesson. Task 1
Route::get('/upload', [UploadController::class, 'show']);
Route::post('/upload', [UploadController::class, 'store']);

// Task 2
Route::get('/gallery', [UploadController::class, 'gallery']);
Route::post('/gallery', [UploadController::class, 'storeMultiple']);

// Task 3
Route::get('/files', [UploadController::class, 'listFiles']);
Route::get('/files/download/{filename}', [UploadController::class, 'download']);
Route::delete('/files/{filename}', [UploadController::class, 'delete']);


// Eloquent Relationships lesson. Task 2
Route::get('/n-plus-1-demo', function()
{ 
    DB::enableQueryLog();

    $tasks = Task::with('category')->get();
    foreach ($tasks as $task) {
        echo $task->title . ' - ' . ($task->category?->name ?? 'none') . '<br>';
    }

    // dd(DB::getQueryLog());
});


// Authentication Lesson. Task 1
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Authorization lesson. Task 1
Route::resource('categories', CategoryController::class);