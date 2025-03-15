<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Services\TaskService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CreateTaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(): View
    {
        $projects = $this->taskService->getProjectsForTaskCreation();
        $users = $this->taskService->getAvailableUsers();
        $priorities = $this->taskService->getTaskPriorities();
        
        return view('tasks.create', compact('projects', 'users', 'priorities'));
    }
}