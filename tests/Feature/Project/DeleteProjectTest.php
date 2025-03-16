<?php

namespace Tests\Feature\Project;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProjectTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;  // Define the property

    protected function setUp(): void  // Add setUp method
    {
        parent::setUp();
        $this->user = User::factory()->create();  // Create the user in setUp
    }

    public function test_user_can_delete_their_project()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('projects.destroy', $project->id));

        $response->assertRedirect(route('projects.index'))
            ->assertSessionHas('success', 'پروژه با موفقیت حذف شد.');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

  
}