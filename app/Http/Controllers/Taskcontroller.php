<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Taskcontroller extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('pages.index', compact('tasks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Task::create([
            'task' => $request->task,
            'description' => $request->description ?? 'No description',
            'created_at' => now(),

        ]);

        return redirect()->route('home')->with('success', 'Task added successfully');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('home')->with('success', 'Task deleted successfully');
    }



    public function edit($id)
    {
        $task = Task::findOrFail($id);
        if ($task->completed) {
            return redirect()->route('home')->with('error', 'Completed tasks cannot be edited');
        }
        return view('pages.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->completed) {
            return redirect()->route('home')->with('error', 'Completed tasks cannot be edited.');
        }

        $request->validate([
            'task' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $task->update([
            'task' => $request->task,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', 'Task updated successfully.');
    }



    public function toggleCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }
}
