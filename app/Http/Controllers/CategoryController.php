<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index() {
        return view('categories.index', ['categories' => Category::all()]);
    }

    public function create() {
        Gate::authorize('manage-categories');
        return view('categories.create_form');
    }

    public function store(Request $request) {
        Gate::authorize('manage-categories');

        $validated = $request->validate([
            'name' => 'required|string|max:30|unique:categories,name'
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'CAtegory ccreated!');
    }

    public function show() {
        
    }

    public function edit(string $id) {
        Gate::authorize('manage-categories');

        $category = Category::findOrFail($id);

        return view('categories.edit_form');
    }

    public function update(Request $request, string $id) {
        Gate::authorize('manage-categories');

        $validated = $request->validate([
            'name'=>'required|string|max:30|unique:categories,name,' . $id
        ]);

        Category::findOrFail($id)->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy() {
        Gate::authorize('manage-categories');

        Category::findOrFail($id)->delete();

        return redirect()->route('categories.index')->with('success', 'CAtegory deleted!');
    }
}
