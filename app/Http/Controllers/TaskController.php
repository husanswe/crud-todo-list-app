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
            'title' => 'required|string|max:30'
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
        $tasks = session('tasks', []);

        $task = collect($tasks)->firstWhere('id', $id);

        if(!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
        return view('tasks.edit', ['task' => $task]);
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
