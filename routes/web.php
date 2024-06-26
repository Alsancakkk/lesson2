<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taskcontroller;


Route::get('/', [TaskController::class, 'index'])->name('home');
Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
Route::delete('/tasks.{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');




Route::post('/tasks/{id}/toggle-completed', [TaskController::class, 'toggleCompleted'])->name('tasks.toggleCompleted');

