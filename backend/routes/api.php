<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/todoapp', [TodoController::class,'index'])->name('todo.index');
Route::post('/todoapp', [TodoController::class,'create'])->name('todo.create');
Route::get('/todoapp', [TodoController::class,'view']);
Route::get('/delete/{id}', [TodoController::class,'delete'])->name('todo.delete');
Route::get('/edit/{id}', [TodoController::class,'edit'])->name('todo.edit');
Route::post('/update/{id}', [TodoController::class,'update'])->name('todo.update');

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks-store', [TaskController::class, 'store']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
