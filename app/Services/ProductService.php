<?php


namespace App\Services;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    protected $product_repository;
    protected $category_service;

    public function __construct(ProductRepository $product_repository, CategoryService $category_service)
    {
        $this->product_repository = $product_repository;
        $this->category_service = $category_service;
    }

    public function saveWithCategoryName($data)
    {
        $category = $this->category_service->getByName($data['category_name']);
        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->category()->associate($category);
        $product->stock = $data['stock'];
        $product->describe = $data['describe'];
        $product->save();
    }

    public function getAllWithPaginate()
    {
        return $this->product_repository->getAllWithPaginate();
    }
}
