<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index() {
        
    }

    public function create() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }

    public function store() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }

    public function edit() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }

    public function update() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }

    public function destroy() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }
}
