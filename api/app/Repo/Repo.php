<?php

namespace App\Repo;

use App\Repo\RepoInterface;

abstract class Repo implements RepoInterface
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        $model = $this->model->create($data);

        return $this->find($model->id);
    }

    public function update($id, $data)
    {
        $this->findOrFail($id)->update($data);

        return $this->find($id);
    }

    public function destroy($id)
    {
        $model = $this->findOrFail($id);
        $model->delete();

        return $model;
    }

    public function firstOrCreate($data)
    {
        return $this->model->firstOrCreate($data);
    }
}
