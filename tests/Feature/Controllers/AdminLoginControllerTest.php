<?php


namespace Tests\Feature\Controllers;


use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminLoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_login_form()
    {
        $this->get('/admin/login')
            ->assertStatus(200);
    }

    public function test_can_authenticate_an_admin()
    {
        $password = "testpass123";

        $admin = factory(Admin::class)->create(['password' => Hash::make($password)]);

        $adminLoginDetails = [
            'password' => $password,
            'email' => $admin->email
        ];

        $this->post('/admin/login', $adminLoginDetails)
            ->assertRedirect(route('admin.dashboard'));

        $this->assertTrue(auth()->guard('admin')->check());
    }

    public function test_can_not_authenticate_an_admin_incorrect_details()
    {
        $password = "testpass123";

        $admin = factory(Admin::class)->create(['password' => Hash::make($password)]);

        $adminLoginDetails = [
            'password' => 'incorrectpassword',
            'email' => $admin->email
        ];

        $this->post('/admin/login', $adminLoginDetails)
            ->assertSessionHas('admin-login-error', 'Email or Password incorrect');

        $this->assertFalse(auth()->guard('admin')->check());
    }

    public function test_can_logout_an_admin()
    {
        $this->get('/admin/logout')
            ->assertRedirect(route('admin.login'));

        $this->assertFalse(auth()->guard('admin')->check());
    }

}
