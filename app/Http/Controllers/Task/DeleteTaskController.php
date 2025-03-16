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
        try {
            $this->authorize('delete', $task->project);
        
            $this->taskService->deleteTask($task->id);
            
            return redirect()
                ->route('projects.show', $task->project_id)
                ->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
        
    }
} 