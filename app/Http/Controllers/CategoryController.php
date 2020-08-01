<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function get(GetCategoryRequest $get_category_request)
    {
        return response([$this->category_service->getAllProducts($get_category_request->category_id)]);
    }
}
