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

        return redirect()->route('home');
    }
    
     public function destroy($id)
     {
        $task = Task::findOrFail($id);
        $task->delete();
         return redirect()->route('home');
    }

    

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('pages.edit', compact('task'));
    }
    
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->task = $request->input('name');
        $task->description = $request->input('description');
        $task->save();
    
        return redirect()->route('home');
    }
    

    public function toggleCompleted($id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }

}
