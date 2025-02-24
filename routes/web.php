<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'showTasks']);

Route::get('/create', [TaskController::class, 'createTask']);
Route::post('/store', [TaskController::class, 'store']);
Route::post('/editTask/{id}', [TaskController::class, 'edit']);

Route::get('/complete/{id}', [TaskController::class, 'completeTask']);
Route::get('/edit/{id}', [TaskController::class, 'editTask']);
Route::delete('/destroy/{id}', [TaskController::class, 'removeTask']);


