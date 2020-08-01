<?php

namespace App\Http\Controllers;

use App\Helpers\CsvProductsHelper;
use App\Http\Requests\GetCsvRequest;
use phpDocumentor\Reflection\Types\Collection;

class ProductController extends Controller
{
    protected $csv_helper;
    public function __construct(CsvProductsHelper $csv_helper)
    {
        $this->csv_helper = $csv_helper;
    }

    public function saveCsv(GetCsvRequest $request)
    {
        return response(["result" => $this->csv_helper->save($request)]);
    }
}
