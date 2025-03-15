<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

interface TaskRepositoryInterface extends RepositoryInterface
{
    public function getProjectsForTaskCreation();
    public function getAvailableUsers();
} 