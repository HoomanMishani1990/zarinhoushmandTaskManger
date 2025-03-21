<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Project\{
    IndexProjectController,
    ShowProjectController,
    StoreProjectController,
    UpdateProjectController,
    DeleteProjectController,
    EditProjectController,
    CreateProjectController
};
use App\Http\Controllers\Task\{
    StoreTaskController,
    UpdateTaskController,
    DeleteTaskController,
    ToggleTaskController,
    TaskController,
    IndexTaskController,
    CreateTaskController,
    EditTaskController
};
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    
    // Projects
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/create', CreateProjectController::class)->name('create');
        Route::post('/projects', StoreProjectController::class)->name('store');
        
        Route::get('/', IndexProjectController::class)->name('index');
        Route::get('/{project}', ShowProjectController::class)->name('show');
        Route::post('/', StoreProjectController::class)->name('store');
        Route::put('/{project}', UpdateProjectController::class)->name('update');
        Route::delete('/{project}', DeleteProjectController::class)->name('destroy');
        Route::get('/{project}/edit', EditProjectController::class)->name('edit');


    });
    
    // Tasks
    Route::get('/tasks/create', CreateTaskController::class)->name('tasks.create');
    Route::post('/tasks/store', StoreTaskController::class)->name('tasks.store');
    Route::get('/taskOfProject/{project}', IndexTaskController::class)->name('project.task.index');
    Route::get('/tasks/{task}/edit', EditTaskController::class)->name('tasks.edit');
    Route::put('/tasks/{task}', UpdateTaskController::class)->name('tasks.update');
    Route::delete('/tasks/{task}', DeleteTaskController::class)->name('tasks.destroy');



    

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    
});

require __DIR__.'/auth.php';
