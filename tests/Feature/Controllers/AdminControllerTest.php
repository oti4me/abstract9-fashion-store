<?php


namespace Tests\Feature\Controllers;


use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_admin_dashboard()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get('/admin/dashboard')
            ->assertStatus(200);
    }
}
