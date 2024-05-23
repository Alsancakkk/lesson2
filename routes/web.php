<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taskcontroller;

//Route::get('/tasks', [Taskcontroller::class,'tasks']);
Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
//Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    

