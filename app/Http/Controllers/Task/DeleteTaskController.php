<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\TaskService;

class DeleteTaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    ) {}

    public function __invoke(Task $task)
    {
        $this->authorize('delete', $task->project);
        
        $this->taskService->delete($task);
        
        return redirect()
            ->route('projects.show', $task->project_id)
            ->with('success', 'Task deleted successfully');
    }
} 