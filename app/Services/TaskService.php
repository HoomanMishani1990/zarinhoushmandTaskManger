<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Project;

class TaskService
{
    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    public function toggleComplete(Task $task): bool
    {
        return $task->update([
            'is_completed' => !$task->is_completed
        ]);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
} 