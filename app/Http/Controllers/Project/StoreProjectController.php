<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Services\ProjectService;

class StoreProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function __invoke(StoreProjectRequest $request)
    {
        $project = $this->projectService->create(
            $request->validated(),
            auth()->id()
        );
        
        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project created successfully');
    }
} 