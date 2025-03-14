<?php

namespace Tests\Feature\Project;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_project(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/api/projects', [
                'name' => 'Test Project',
                'description' => 'Test Description',
                'start_date' => now()->format('Y-m-d'),
                'deadline' => now()->addDays(30)->format('Y-m-d'),
                'status' => 'todo'
            ]);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => 'Test Project',
                    'description' => 'Test Description'
                ]
            ]);

        $this->assertDatabaseHas('projects', [
            'name' => 'Test Project',
            'user_id' => $user->id
        ]);
    }

    public function test_unauthenticated_user_cannot_create_project(): void
    {
        $response = $this->postJson('/api/projects', [
            'name' => 'Test Project',
            'description' => 'Test Description'
        ]);

        $response->assertStatus(401);
    }
} 