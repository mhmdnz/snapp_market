<?php


namespace App\Repositories;


class AbstractRepository
{
    public function save($request)
    {
         return $this->model->create($request->all());
    }

    public function getAll()
    {
        return $this->model->paginate(15);
    }

    public function getAllWith(array $relations)
    {
        return $this->model->with($relations)->paginate(15);
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function getAllWithPaginate()
    {
        return $this->model->paginate(15);
    }

    public function getWith($id, array $relations)
    {
        return $this->model->with($relations)->where('id', $id)->first();
    }
}
