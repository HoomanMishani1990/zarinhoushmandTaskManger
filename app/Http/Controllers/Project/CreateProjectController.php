<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateProjectController extends Controller
{
    /**
     * Display the project creation form.
     */
    public function __invoke(): View|RedirectResponse
    {
        try{    
            return view('projects.create');
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
