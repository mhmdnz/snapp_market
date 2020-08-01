<?php


namespace App\Repositories;

use App\Category;

class CategoryRepository  extends AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
