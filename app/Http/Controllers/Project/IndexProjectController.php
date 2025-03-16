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
        try{
            $projects = $this->projectService->getUserProjects(auth()->id());

            $projects->each(function ($project) {
                $project->members = $project->members()->take(3)->get();
    
                return $project;
            });
            
            return view('projects.index', compact('projects'));
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
        
    }
} 