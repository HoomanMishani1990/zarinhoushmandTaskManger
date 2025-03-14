<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\TaskService;

class ToggleTaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    ) {}

    public function __invoke(Task $task)
    {
        $this->authorize('update', $task->project);
        
        $this->taskService->toggleComplete($task);
        
        return redirect()
            ->route('projects.show', $task->project_id)
            ->with('success', 'Task status updated successfully');
    }
} 