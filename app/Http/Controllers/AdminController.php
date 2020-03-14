<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function dashboard(Request $request)
    {
        $products = ProductRepository::getUnapproved(5);

        return view('admin.dashboard', compact('products'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function products(Request $request)
    {
        $products = ProductRepository::getUnapproved(10);

        return view('admin.products', compact('products'));
    }

    /**
     * @param Product $product
     * @return Factory|View
     */
    public function approveProduct(Product $product)
    {
        $product = ProductRepository::approve($product->id);

        if(!$product) back()->with('error', 'Problem approving product, try again later!!');;

        return back()->with('success', 'Product approved successfully');
    }

    /**
     * @param Product $product
     * @return Factory|View
     */
    public function rejectProduct(Product $product)
    {
        $product = ProductRepository::reject($product->id);

        if(!$product) back()->with('error', 'Problem rejecting product, try again later!!');;

        return back()->with('success', 'Product rejection completed');
    }
}
