<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;

class IndexProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function __invoke()
    {
        $projects = $this->projectService->getUserProjects(auth()->id());
        
        return view('projects.index', compact('projects'));
    }
} 