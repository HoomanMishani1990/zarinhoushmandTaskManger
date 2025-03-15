<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;

class UpdateTaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(UpdateTaskRequest $request, int $id): RedirectResponse
    {
        try {
            $this->taskService->updateTask($id, $request->validated());

            return redirect()
                ->route('tasks.index')
                ->with('success', __('tasks.updated_successfully'));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('tasks.update_failed'));
        }
    }
} 