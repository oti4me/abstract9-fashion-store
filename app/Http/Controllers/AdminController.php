<?php

namespace App\Http\Controllers;

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
}
