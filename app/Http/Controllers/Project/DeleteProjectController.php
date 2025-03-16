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
        try{
            $this->authorize('delete', $project);
            
            $this->projectService->deleteProject($project->id);
            
            return redirect()
                ->route('projects.index')
                    ->with('success', 'پروژه با موفقیت حذف شد.');
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
} 