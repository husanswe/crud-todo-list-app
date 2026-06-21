<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = session('tasks', []);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:30'
        ]);

        $tasks = session('tasks', []);

        $taskData = [
            'id' => time(),
            'title' => $validated['title'],
            'done' => $request->boolean('done')
        ];

        session()->push('tasks', $task);
        return redirect()->route('tasks.index')->with('success', 'Task created!');

        // Redirect to the index route with a flash message
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $tasks = session('tasks', []);

        $task = collect($tasks)->firstWhere('id', $id);

        return view('tasks.edit', ['task' => $task]);
        if(!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:30'
        ]);

        $tasks = session('tasks', []);

        foreach ($tasks as $i => $t) {
            if ($t['id'] == $id) {
                $tasks[$i]['title'] = $request->input('title');
                $tasks[$i]['done'] = $request->boolean('done');
                break;
            }
        }
        session(['tasks' => $tasks]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }


    public function destroy(string $id)
    {
        $tasks = session('tasks', []);
        $tasks = array_filter($tasks, fn($t) => $t['id'] !=$id);
        $tasks = array_values($tasks);
        session(['tasks' => $tasks]);
        
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
