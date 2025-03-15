<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Services\TaskService;

class IndexTaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }


    public function __invoke($project)
    {
        $tasks = $this->taskService->getTasksByProject($project);

        return view('tasks.index', compact('tasks'));   
    }
}