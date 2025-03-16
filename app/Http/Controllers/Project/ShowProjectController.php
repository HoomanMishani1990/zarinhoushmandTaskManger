<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ShowProjectController extends Controller
{
    public function __invoke(Project $project)
    {
        try{
            return view('projects.edit', compact('project'));
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
        
        
    }
} 