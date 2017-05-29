<?php

namespace App\Repo;

use App\Model\Listing;
use Carbon\Carbon;

class ListingRepo extends Repo
{
    protected $default_includes = ['images', 'user'];

    public function __construct(Listing $listing)
    {
        $this->model = $listing;
    }

    public function all()
    {
        return $this->model->with($this->default_includes)->get();
    }

    public function findOrFail($id)
    {
        return $this->model->with($this->default_includes)->findOrFail($id);
    }
}
