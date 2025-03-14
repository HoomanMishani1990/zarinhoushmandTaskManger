<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;

class UpdateTaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    ) {}

    public function __invoke(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task->project);
        
        $this->taskService->update($task, $request->validated());
        
        return redirect()
            ->route('projects.show', $task->project_id)
            ->with('success', 'Task updated successfully');
    }
} 