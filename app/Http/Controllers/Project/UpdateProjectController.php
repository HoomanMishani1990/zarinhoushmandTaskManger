<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;

class UpdateProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function __invoke(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        
        $this->projectService->update($project, $request->validated());
        
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }
} 