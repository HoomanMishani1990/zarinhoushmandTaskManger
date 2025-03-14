<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{
    public function getUserProjects(int $userId): Collection
    {
        return Project::where('user_id', $userId)
            ->withCount('tasks')
            ->latest()
            ->get();
    }

    public function create(array $data, int $userId): Project
    {
        return Project::create([
            ...$data,
            'user_id' => $userId
        ]);
    }

    public function update(Project $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
} 