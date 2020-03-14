<?php


namespace Tests\Feature\Controllers;


use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\User;
use App\Models\UserType;
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

    public function test_can_view_unapproved_products()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get('/admin/products')
            ->assertStatus(200);
    }

    public function test_can_approved_a_product()
    {
        $vendor = factory(User::class)->create([ 'user_type' => UserType::VENDOR]);
        $product = factory(Product::class)->create([ 'vendor_id' => $vendor->id]);

        $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get(route('admin.approve', $product->id));

        $product->refresh();

        $this->assertEquals($product->status, ProductStatus::APPROVED);
    }

    public function test_can_reject_a_product()
    {
        $vendor = factory(User::class)->create([ 'user_type' => UserType::VENDOR]);
        $product = factory(Product::class)->create([ 'vendor_id' => $vendor->id]);

        $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get(route('admin.reject', $product->id));

        $product->refresh();

        $this->assertEquals($product->status, ProductStatus::DENIED);
    }
}
