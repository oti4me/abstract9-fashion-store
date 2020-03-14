<?php


namespace App\Repositories;


use App\Models\Product;

class VendorRepository
{
    /**
     * Create a new product instance.
     *
     * @param array $data
     * @return Product
     */
    public static function addProduct(array $data)
    {
        return Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'brand' => $data['brand'],
            'condition' => $data['condition'],
            'quantity' => $data['quantity'],
            'vendor_id' => auth()->user()->id,
        ]);
    }
}
