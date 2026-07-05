<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use App\Models\Tag;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200'
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'done'  => $request->boolean('done'),
        ]);

        $task->tags()->sync($request->input('tags', []));

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(int $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', [
            'task' => $task,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate(['title' => 'required|string|max:200']);
        $task = Task::findOrFail($id);
        
        $task->update([
            'title' => $validated['title'],
            'done' => $request->boolean('done'),
        ]);

        $task->tags()->sync($request->input('tags', []));

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }


    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
