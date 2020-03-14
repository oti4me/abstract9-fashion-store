<?php


namespace Tests\Feature\Controllers;


use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_customer_account()
    {
        $userFactory = factory(User::class)->make();

        $userDetails = array_merge($userFactory->toArray(), ['password' => $userFactory->password]);

        $this->mock(UserRepository::class)
            ->shouldReceive('createUser')
            ->with($userDetails)
            ->andReturn($userFactory);

        $this->post(route('user.signup'), $userDetails)
            ->assertRedirect(route('customer.dashboard'));

        $this->assertTrue(auth()->check());
    }

    public function test_can_create_a_vendor_account()
    {
        $userFactory = factory(User::class)->make();

        $userDetails = array_merge($userFactory->toArray(), ['password' => $userFactory->password, 'is_vendor' => 'on']);

        $this->mock(UserRepository::class)
            ->shouldReceive('createUser')
            ->with($userDetails)
            ->andReturn($userFactory);

        $this->post(route('user.signup'), $userDetails)
            ->assertRedirect(route('vendor.dashboard'));

        $this->assertTrue(auth()->check());
    }
}
