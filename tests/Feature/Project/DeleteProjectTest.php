<?php

namespace Tests\Feature\Project;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_delete_their_project()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('projects.destroy', $project->id));

        $response->assertRedirect(route('projects.index'))
            ->assertSessionHas('success', 'پروژه با موفقیت حذف شد.');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_user_cannot_delete_others_project()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->delete(route('projects.destroy', $project));

        $response->assertStatus(403);
    }
}