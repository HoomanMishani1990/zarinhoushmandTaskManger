<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;

class ProjectService
{
    private ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Get user projects with tasks count
     */
    public function getUserProjects(int $userId): Collection
    {
        return $this->projectRepository
            ->scopeQuery(function($query) use ($userId) {
                return $query->where('user_id', $userId)
                    ->withCount('tasks')
                    ->latest();
            })
            ->all();
    }

    /**
     * Create new project
     */
    public function createProject(array $data)
    {
        return $this->projectRepository->create($data);
    }

    /**
     * Update existing project
     */
    
    public function update($project, array $data)
    {
        return $this->projectRepository->update($data, $project->id);
    }

    /**
     * Delete project
     */
    public function deleteProject(int $id)
    {
        return $this->projectRepository->delete($id);
    }

    /**
     * Find project by ID
     */
    public function findProject(int $id)
    {
        return $this->projectRepository->find($id);
    }

    /**
     * Get paginated projects
     */
    public function getPaginatedProjects(int $perPage = 10)
    {
        $this->projectRepository->pushCriteria(app(RequestCriteria::class));
        return $this->projectRepository->paginate($perPage);
    }

    /**
     * Get project with relations
     */
    public function getProjectWithRelations(int $id, array $relations = [])
    {
        return $this->projectRepository->with($relations)->find($id);
    }

    /**
     * Get projects by status
     */
    public function getProjectsByStatus(string $status)
    {
        return $this->projectRepository
            ->scopeQuery(function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->all();
    }

    /**
     * Get projects count by status
     */
    public function getProjectsCountByStatus(string $status)
    {
        return $this->projectRepository
            ->scopeQuery(function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->count();
    }

    
} 