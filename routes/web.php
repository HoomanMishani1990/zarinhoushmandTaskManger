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
    CreateTaskController
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
    Route::prefix('tasks')->name('tasks.')->group(function () {
        
        Route::post('/', StoreTaskController::class)->name('store');
        Route::put('/{task}', UpdateTaskController::class)->name('update');
        Route::delete('/{task}', DeleteTaskController::class)->name('delete');
        Route::patch('/{task}/toggle', ToggleTaskController::class)->name('toggle');
    });
    Route::get('/taskOfProject/{project}', IndexTaskController::class)->name('project.task.index');

    Route::get('/kanban', function () {
        return view('kanban.index');
    })->name('kanban.index');


    

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    Route::get('/tasks/create', CreateTaskController::class)->name('tasks.create');

});

require __DIR__.'/auth.php';
