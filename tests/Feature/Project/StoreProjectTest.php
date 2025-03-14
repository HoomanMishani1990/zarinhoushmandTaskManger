<?php

namespace Tests\Feature\Project;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_project(): void
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

    public function test_unauthenticated_user_cannot_create_project(): void
    {
        $response = $this->post(route('projects.store'), [
            'name' => 'Test Project',
            'description' => 'Test Description'
        ]);

        $response->assertRedirect(route('login'));
    }
} 