<?php

namespace App\Http\Controllers;

use App\Helpers\CsvProductsHelper;
use App\Http\Requests\GetCsvRequest;
use App\Http\Requests\GetCategoryRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $csv_helper;
    protected $product_service;

    public function __construct
    (
        CsvProductsHelper $csv_helper,
        ProductService $product_service
    )
    {
        $this->csv_helper = $csv_helper;
        $this->product_service = $product_service;
    }

    public function saveCsv(GetCsvRequest $request)
    {
        return response(["result" => $this->csv_helper->save($request)]);
    }

    public function get()
    {
        return response(['products' => $this->product_service->getAllWithPaginate()]);
    }
}
