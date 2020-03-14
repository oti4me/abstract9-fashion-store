<?php


namespace App\Repositories;


use App\Models\Product;
use App\Models\ProductStatus;

class ProductRepository
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

    /**
     * Get the number of products specified in pages
     *
     * @param integer $size
     * @return Product[]
     */
    public static function getUnapproved($size)
    {
        return Product::whereStatus(ProductStatus::SUBMITTED)
            ->orderBy('id', 'DESC')
            ->paginate($size);
    }

    /**
     * Get the number of products specified in pagination
     *
     * @param integer $size
     * @return Product[]
     */
    public static function getAll($size)
    {
        return Product::orderBy('id', 'DESC')
            ->paginate($size);
    }

    /**
     * @param $vendorId
     * @param $size
     * @return mixed
     */
    public static function getVendorProducts($vendorId, $size)
    {
        return Product::whereVendorId($vendorId)
            ->orderBy('id', 'DESC')
            ->paginate($size);
    }

    /**
     * Get the number of products specified in pagination
     *
     * @param $productId
     * @return Product[]
     */
    public static function approve($productId)
    {
        return Product::find($productId)
            ->update([
                'status' => ProductStatus::APPROVED
            ]);
    }

    /**
     * Get the number of products specified in pagination
     *
     * @param $productId
     * @return Product[]
     */
    public static function reject($productId)
    {
        return Product::find($productId)
            ->update([
                'status' => ProductStatus::DENIED
            ]);
    }
}
