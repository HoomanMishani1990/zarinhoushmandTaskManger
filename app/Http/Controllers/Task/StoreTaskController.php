<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;

class StoreTaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(CreateTaskRequest $request): RedirectResponse
    {
        \Log::info('StoreTaskController was called');
        // try {
            $this->taskService->createTask($request->validated());

            return redirect()
                ->route('tasks.index')
                ->with('success', __('tasks.created_successfully'));

        // } catch (\Exception $e) {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with('error', __('tasks.create_failed'));
        // }
    }
} 