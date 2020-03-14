<?php


namespace Tests\Feature\Requests;


use App\Http\Controllers\VendorController;
use App\Http\Requests\CreateProductFormRequest;
use Tests\TestCase;

class CreateProductFormRequestTest extends TestCase
{
    public function test_create_product_form_request()
    {
        $this->assertActionUsesFormRequest(
            VendorController::class,
            'addProduct',
            CreateProductFormRequest::class
        );
    }

    public function test_validation_rules()
    {
        $this->assertEquals([
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:5', 'max:255'],
            'price' => ['required', 'numeric'],
            'brand' => ['required', 'min:3'],
            'condition' => ['required', 'min:3'],
            'quantity' => ['numeric'],
        ], (new CreateProductFormRequest())->rules());
    }
}
