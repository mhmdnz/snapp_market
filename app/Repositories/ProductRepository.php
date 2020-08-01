<?php


namespace App\Repositories;

use App\Product;

class ProductRepository extends AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
