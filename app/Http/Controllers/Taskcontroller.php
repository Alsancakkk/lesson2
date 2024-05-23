<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class Taskcontroller extends Controller
{
    public function index() 
    {
        $tasks = Task::all();
        return view('layouts.app', compact('tasks'));
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
            
        ]);

        return redirect()->route('layouts.app');
    }
    
    // public function destroy(Task $task)
    // {
    //     $task->delete();
    //     return view('layouts.app')
    // }

}
