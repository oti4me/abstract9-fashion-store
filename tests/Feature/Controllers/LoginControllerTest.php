<?php


namespace Tests\Feature\Controllers;


use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_authenticate_a_user()
    {
        $password = "testpass123";

        $user = factory(User::class)->create(['password' => Hash::make($password)]);

        $this->mock(UserRepository::class)
            ->shouldReceive('getUserByEmail')
            ->with($user->email)
            ->andReturn($user);

        $userDetails = [
            'email' => $user->email,
            'password' => $password,
        ];

        $this->post('/login', $userDetails)
            ->assertRedirect(route('user.profile'));

        $this->assertTrue(auth()->check());

        $this->assertAuthenticatedAs($user);
    }

    public function test_can_sign_out_a_user()
    {
        $this->get('/logout')
            ->assertRedirect(route('home'));

        $this->assertFalse(auth()->check());
    }

}
