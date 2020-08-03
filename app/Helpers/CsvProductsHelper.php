<?php


namespace App\Helpers;

use App\Services\ProductService;
use Illuminate\Support\Facades\DB;

class CsvProductsHelper
{
    protected $product_service;
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function save($request)
    {
        $data = $this->getCollection($request);
        try {
            DB::transaction(function () use($data){
                $data->each(function ($product){
                    $this->product_service->saveWithCategoryName($product);
                });
            });
            return true;
        } catch (\Throwable $exception){
            return false;
        }

    }

    private function getCollection($request)
    {
        $path = $request->file('products')->getRealPath();
        $data = collect(array_map('str_getcsv', file($path)));
        $csv_header_fields = collect($data->first());
        $data->shift();
        $result = collect();
        $data->each(function ($product) use($csv_header_fields, $result){
            $result->add($csv_header_fields->combine($product));
        });

        return $result;
    }
}
