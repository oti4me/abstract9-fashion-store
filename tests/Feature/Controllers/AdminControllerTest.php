<?php


namespace Tests\Feature\Controllers;


use App\Models\Admin;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    public function test_can_view_admin_dashboard()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get('/admin/dashboard')
            ->assertStatus(200);
    }
}
