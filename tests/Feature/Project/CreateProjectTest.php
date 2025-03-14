<?php

namespace Tests\Feature\Project;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_project(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post(route('projects.store'), [
            'name' => 'Test Project',
            'description' => 'Test Description'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('projects', [
            'name' => 'Test Project',
            'user_id' => $user->id
        ]);
    }

    public function test_user_cannot_create_project_without_name(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post(route('projects.store'), [
            'description' => 'Test Description'
        ]);

        $response->assertSessionHasErrors(['name']);
    }
} 