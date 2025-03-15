<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Task::class; 
    }

    /**
     * Get all tasks for a specific project.
     *
     * @param int $projectId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTasksByProject($projectId)
    {
        return $this->findWhere(['project_id' => $projectId]);
    }

    public function getProjectsForTaskCreation()
    {
        return Project::select(['id', 'name'])
            ->where('user_id', auth()->user()->id)
            ->orderBy('name')
            ->get();
    }

    public function getAvailableUsers()
    {
        return User::select(['id', 'name'])
            ->orderBy('name')
            ->get();
    }
}