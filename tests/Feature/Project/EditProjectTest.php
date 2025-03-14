<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_edit_form_for_their_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('projects.edit', $project));

        $response->assertStatus(200)
            ->assertViewIs('projects.edit')
            ->assertSee($project->name);
    }

    public function test_user_cannot_view_edit_form_for_others_project(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)
            ->get(route('projects.edit', $project));

        $response->assertStatus(403);
    }
} 