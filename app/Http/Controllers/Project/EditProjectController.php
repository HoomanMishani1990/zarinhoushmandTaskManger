<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Models\Project;
use Illuminate\View\View;

class EditProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Show project edit form
     */
    public function __invoke(Project $project): View
    {
        try{
            $this->authorize('update', $project);

            return view('projects.edit', [
                'project' => $this->projectService->findProject($project->id)
            ]);
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
        
    }
} 