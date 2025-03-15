<?php

namespace App\Providers;

use App\Repositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProjectRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }
} 