<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Services\TaskService;
use Illuminate\View\View;

class EditTaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(int $id): View|RedirectResponse
    {
        try {
            $task = $this->taskService->findTask($id);
            $projects = $this->taskService->getProjectsForTaskCreation();
            $users = $this->taskService->getAvailableUsers();
            $priorities = $this->taskService->getTaskPriorities();
    
            return view('tasks.edit', compact('task', 'projects', 'users', 'priorities'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
} 