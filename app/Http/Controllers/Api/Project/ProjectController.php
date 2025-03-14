<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/projects",
 *     summary="Get all projects",
 *     tags={"Projects"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="List of projects",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer"),
 *                     @OA\Property(property="name", type="string"),
 *                     @OA\Property(property="description", type="string"),
 *                     @OA\Property(property="created_at", type="string", format="datetime")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated"
 *     )
 * )
 */
class ProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {}

    public function index(): JsonResponse
    {
        $projects = $this->projectService->getUserProjects(auth()->id());
        
        return response()->json([
            'data' => ProjectResource::collection($projects)
        ]);
    }

    public function show(Project $project): JsonResponse
    {
        $this->authorize('view', $project);
        
        return response()->json([
            'data' => new ProjectResource($project)
        ]);
    }
} 