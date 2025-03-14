<?php

namespace App\Repositories;

use App\Models\Project;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

class ProjectRepository extends BaseRepository implements RepositoryInterface   
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class; 
    }
}