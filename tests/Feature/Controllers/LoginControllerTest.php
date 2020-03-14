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

    public function test_can_authenticate_a_customer()
    {
        $password = "testpass123";

        $user = factory(User::class)->create(['password' => Hash::make($password), 'user_type' => 1]);

        $this->mock(UserRepository::class)
            ->shouldReceive('getUserByEmail')
            ->with($user->email)
            ->andReturn($user);

        $loginDetails = [
            'email' => $user->email,
            'password' => $password,
        ];

        $this->post('/login', $loginDetails)
            ->assertRedirect(route('customer.dashboard'));

        $this->assertTrue(auth()->check());

        $this->assertAuthenticatedAs($user);
    }

    public function test_can_authenticate_a_vendor()
    {
        $password = "testpass123";

        $user = factory(User::class)->create(['password' => Hash::make($password), 'user_type' => 2]);

        $this->mock(UserRepository::class)
            ->shouldReceive('getUserByEmail')
            ->with($user->email)
            ->andReturn($user);

        $loginDetails = [
            'email' => $user->email,
            'password' => $password,
        ];

        $this->post('/login', $loginDetails)
            ->assertRedirect(route('vendor.dashboard'));

        $this->assertTrue(auth()->check());

        $this->assertAuthenticatedAs($user);
    }

    public function test_can_sign_out_a_user()
    {
        $this->get('/logout')
            ->assertRedirect(route('home'));

        $this->assertFalse(auth()->check());
    }

    public function test_can_view_login_form()
    {
        $this->get(route('user.login.form'))
            ->assertStatus(200);

        $this->assertFalse(auth()->check());
    }

    public function test_can_not_login_with_unregistered_user_details()
    {
        session()->start();

        $this->post(route('user.login'), ['email' => 'nouser@example.com', 'password' => 'thisisamerica'])
            ->assertSessionHas('login-error', 'Email or Password incorrect');

        $this->assertFalse(auth()->check());
    }

}
