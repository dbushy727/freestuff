<?php

namespace App\Repo;

interface RepoInterface
{
    public function all();
    public function find($id);
    public function findOrFail($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
