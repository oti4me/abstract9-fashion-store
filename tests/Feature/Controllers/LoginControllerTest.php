<?php


namespace Tests\Feature\Controllers;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_authenticate()
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
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('user.profile'));
    }

}
