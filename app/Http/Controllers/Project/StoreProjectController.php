<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Services\ProjectService;
use Illuminate\Http\RedirectResponse;

class StoreProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Store a newly created project in storage.
     */
    public function __invoke(StoreProjectRequest $request)
    {
        try{
            $data = $request->validated();
            $data['user_id'] = auth()->id();
    
            $this->projectService->createProject($data);
    
            return redirect()->route('projects.index')->with('success', __('پروژه با موفقیت ایجاد شد.'));
               
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
} 