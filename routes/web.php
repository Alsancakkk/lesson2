<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taskcontroller;


Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks.index', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    

