<?php

namespace Tests\Feature\Api;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Project $project;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->project = Project::factory()->create(['user_id' => $this->user->id]);
        
        Sanctum::actingAs($this->user);
    }

    public function test_can_get_tasks(): void
    {
        $user = User::factory()->create();
        Task::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')
            ->getJson(route('tasks.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'description',
                    'status',
                    'project_id',
                    'user_id',
                ]
            ]);
    }

    public function test_can_create_task(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $taskData = [
            'name' => 'New Task',
            'description' => 'Task Description',
            'status' => 'todo',
            'project_id' => $project->id,
        ];

        $response = $this->actingAs($user, 'sanctum')
            ->postJson(route('tasks.store'), $taskData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'status',
                    'project_id',
                    'user_id',
                ]
            ]);

        $this->assertDatabaseHas('tasks', [
            'name' => 'New Task',
            'user_id' => $user->id,
        ]);
    }
} 