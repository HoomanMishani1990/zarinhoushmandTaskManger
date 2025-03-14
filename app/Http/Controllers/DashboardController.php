<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;

class DashboardController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function __invoke()
    {
        $projects = $this->projectService->getUserProjects(auth()->id());
        
        return view('dashboard', compact('projects'));
    }
} 