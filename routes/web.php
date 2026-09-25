<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::resource('tasks', TaskController::class)->except(['index', 'show']);
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.status');