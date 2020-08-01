<?php


namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $category_repository;
    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    public function get($id)
    {
        $this->category_repository->get($id);
    }

    public function getByName($name)
    {
        return $this->category_repository->getByName($name);
    }

    public function getAllProducts($category_id)
    {
        if ($category_id)
            return $this->category_repository->getWith($category_id, ['products']);

        return $this->category_repository->getAllWith(['products']);
    }
}
