<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Services\TaskService;
use App\Models\Task;

class StoreTaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    ) {}

    public function __invoke(StoreTaskRequest $request)
    {
        $this->authorize('create', [Task::class, $request->project_id]);
        
        $task = $this->taskService->create($request->validated());
        
        return redirect()
            ->route('projects.show', $task->project_id)
            ->with('success', 'Task created successfully');
    }
} 