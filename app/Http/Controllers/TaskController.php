<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200'
        ]);

        Task::create([
            'title' => $validated['title'],
            'done'  => $request->boolean('done'),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', ['task' => $task]);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate(['title' => 'required|string|max:200']);
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $validated['title'],
            'done' => $request->boolean('done'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }


    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
