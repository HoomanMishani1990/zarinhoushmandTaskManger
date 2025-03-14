<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateProjectController extends Controller
{
    /**
     * Display the project creation form.
     */
    public function __invoke(): View
    {
        return view('projects.create');
    }
} 