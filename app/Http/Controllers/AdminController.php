<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view ('admin.dashboard', [
            'usersCount' => User::count(),
            'tasksCount' => Task::count(),
            'categoriesCount' => Category::count(),
        ]);
    }

    public function users()
    {
        return view('admin.users', ['users' => User::all()]);
    }
}
