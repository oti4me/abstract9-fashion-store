<?php


namespace Tests\Feature\Controllers;


use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_user_account()
    {
        $userFactory = factory(User::class)->make();

        $userDetails = array_merge($userFactory->toArray(), ['password' => $userFactory->password]);

        $this->mock(UserRepository::class)
            ->shouldReceive('createUser')
            ->with($userDetails)
            ->andReturn($userFactory);

        $this->post(route('user.signup'), $userDetails)
            ->assertRedirect(route('user.profile'));

        $this->assertTrue(auth()->check());
    }
}
