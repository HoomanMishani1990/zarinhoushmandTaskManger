<?php

namespace Tests\Feature\Task;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Project $project;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->project = Project::factory()->create();
    }

    /** @test */
    public function authenticated_user_can_view_create_task_page()
    {
        $response = $this->actingAs($this->user)
            ->get(route('tasks.create'));

        $response->assertStatus(200)
            ->assertViewIs('tasks.create')
            ->assertSee('ایجاد وظیفه جدید');
    }

    /** @test */
    public function unauthenticated_user_cannot_view_create_task_page()
    {
        $response = $this->get(route('tasks.create'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function task_can_be_created_with_valid_data()
    {
        Storage::fake('attachments');

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store'), [
                'title' => 'Test Task',
                'description' => 'Test Description',
                'project_id' => $this->project->id,
                'assigned_to' => $this->user->id,
                'priority' => 'medium',
                'due_date' => now()->addDays(5)->format('Y-m-d'),
                'estimated_hours' => 8,
                'attachments' => [
                    UploadedFile::fake()->create('document.pdf', 100)
                ]
            ]);

        $response->assertRedirect(route('tasks.index'))
            ->assertSessionHas('success', 'وظیفه با موفقیت ایجاد شد');

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'project_id' => $this->project->id,
            'assigned_to' => $this->user->id
        ]);
    }

    /** @test */
    public function task_cannot_be_created_with_invalid_data()
    {
        $response = $this->actingAs($this->user)
            ->post(route('tasks.store'), [
                'title' => '',
                'description' => '',
                'project_id' => '',
                'assigned_to' => '',
                'priority' => '',
                'due_date' => '',
                'estimated_hours' => ''
            ]);

        $response->assertSessionHasErrors([
            'title', 'description', 'project_id', 
            'assigned_to', 'priority', 'due_date', 
            'estimated_hours'
        ]);
    }
} 