<?php

use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;

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


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/department', [DepartmentController::class, 'index']);
Route::post('/department-store', [DepartmentController::class, 'store']);
Route::delete('/department/{id}', [DepartmentController::class, 'destroy']);

Route::get('/position', [PositionController::class, 'index']);
Route::post('/position-store', [PositionController::class, 'store']);
Route::delete('/position/{id}', [PositionController::class, 'destroy']);

Route::post('/employee', [EmployeeController::class, 'store']);
Route::get('/employee', [EmployeeController::class, 'index']);
