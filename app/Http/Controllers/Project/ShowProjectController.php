<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ShowProjectController extends Controller
{
    public function __invoke(Project $project)
    {
        // $this->authorize('view', $project);
        
        return view('projects.show', compact('project'));
    }
} 