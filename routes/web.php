<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Landing page route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Project routes
Route::prefix('project')->name('project')->group(function () {
    Route::post('create', [ProjectController::class, 'create'])->name('.create');
});

// Task routes
Route::prefix('task')->name('task')->group(function () {
    Route::post('create', [TaskController::class, 'create'])->name('.create');
    Route::post('update', [TaskController::class, 'update'])->name('.update');
    Route::post('delete', [TaskController::class, 'delete'])->name('.delete');
    Route::post('reorder', [TaskController::class, 'reorder'])->name('.reorder');
});
