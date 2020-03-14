<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductFormRequest;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('vendor');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function dashboard(Request $request)
    {
        return view('vendor.dashboard');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function addProductform(Request $request)
    {
        return view('vendor.add-product');
    }

    /**
     * @param CreateProductFormRequest $request
     * @return Factory|View
     */
    public function addProduct(CreateProductFormRequest $request)
    {
        $productDetails = $request->only(['title', 'description', 'price', 'brand', 'condition', 'quantity',]);

        $product = ProductRepository::addProduct($productDetails);

        return back()->with('success', "The product '$product->title' added successfully");
    }
}
