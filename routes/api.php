<?php

use App\Http\Controllers\Api\Project\ProjectController;
use App\Http\Controllers\Api\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('tasks', TaskController::class);
}); 