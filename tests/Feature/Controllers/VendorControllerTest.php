<?php


namespace Tests\Feature\Controllers;


use App\Models\User;
use App\Models\UserType;
use Tests\TestCase;

class VendorControllerTest extends TestCase
{
    public function test_can_view_dashboard()
    {
        $this->actingAs(factory(User::class)->create(['user_type' => UserType::VENDOR]))
            ->get(route('vendor.dashboard'))
            ->assertStatus(200);
    }

    public function test_can_view_add_product_form()
    {
        $this->actingAs(factory(User::class)->create(['user_type' => UserType::VENDOR]))
            ->get(route('vendor.add.form'))
            ->assertStatus(200);
    }

    public function test_can_add_a_product_form()
    {
        $productDetails = [
            'title' => 'new title',
            'description' => 'new description',
            'price' => 30,
            'brand' => 'nike',
            'condition' => 'new',
            'quantity' => 2,
        ];

        $this->actingAs(factory(User::class)->create(['user_type' => UserType::VENDOR]))
            ->post(route('vendor.product.add'), $productDetails)
            ->assertSessionHas('success', 'The product \'' . $productDetails['title'] . '\' added successfully');
    }

    public function test_can_view_add_products()
    {
        $vendor = factory(User::class)->create(['user_type' => UserType::VENDOR]);

        $this->actingAs($vendor)
            ->get(route('vendor.products', $vendor->id))
            ->assertStatus(200);
    }
}
