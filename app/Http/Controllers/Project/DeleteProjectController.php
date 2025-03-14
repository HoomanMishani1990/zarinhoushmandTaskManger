<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectService;

class DeleteProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function __invoke(Project $project)
    {
        $this->authorize('delete', $project);
        
        $this->projectService->delete($project);
        
        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
} 