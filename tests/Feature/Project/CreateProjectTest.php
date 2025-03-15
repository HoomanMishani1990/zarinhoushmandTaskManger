<?php

namespace Tests\Feature\Project;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_create_project_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('projects.create'));

        $response->assertStatus(200)
            ->assertViewIs('projects.create');
    }

    public function test_user_can_create_project()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('projects.store'), [
            'name' => 'New Project',
            'client_name' => 'Client Name',
            'total_budget' => 10000,
            'start_date' => now()->format('Y-m-d'),
            'deadline' => now()->addDays(30)->format('Y-m-d'),
            'description' => 'Project Description',
        ]);

        $response->assertRedirect(route('projects.index'))
            ->assertSessionHas('success', 'پروژه با موفقیت ایجاد شد.');

        $this->assertDatabaseHas('projects', [
            'name' => 'New Project',
            'user_id' => $user->id,
        ]);
    }

    
} 