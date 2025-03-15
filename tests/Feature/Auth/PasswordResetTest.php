<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        Notification::fake();
        $this->user = User::factory()->create();
    }

    

    #[Test]
    public function reset_password_link_cannot_be_requested_with_invalid_email(): void
    {
        $response = $this->from('/forgot-password')
            ->post('/forgot-password', [
                'email' => 'nonexistent@example.com'
            ]);

        $response->assertRedirect('/forgot-password')
            ->assertSessionHasErrors('email');

        Notification::assertNothingSent();
    }

   

    #[Test]
    public function password_cannot_be_reset_with_invalid_token(): void
    {
        $response = $this->post('/reset-password', [
            'token' => 'invalid-token',
            'email' => $this->user->email,
            'password' => 'NewPassword123!',
            'password_confirmation' => 'NewPassword123!'
        ]);

        $response->assertSessionHasErrors('email');
    }

    
}
