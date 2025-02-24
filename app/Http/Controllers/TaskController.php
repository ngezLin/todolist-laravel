<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|string',
            'due_date' => 'required|date',
            'description' => 'required|string',
            'materials' => 'nullable|url',
            'completion_percentage' => 'nullable|integer|min:0|max:100',
        ]);

        Task::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'customer_id' => Auth::id(),
            'due_date' => $request->due_date,
            'description' => $request->description,
            'materials' => $request->materials,
            'completion_percentage' => $request->completion_percentage ?? 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'Task added successfully!');
    }

    public function edit(Task $task)
    {
        if ($task->customer_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->customer_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|string',
            'due_date' => 'required|date',
            'description' => 'required|string',
            'materials' => 'nullable|url',
            'completion_percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $task->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        if ($task->customer_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully!');
    }
}
