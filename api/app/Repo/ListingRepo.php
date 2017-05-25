<?php

namespace App\Repo;

use App\Model\Listing;
use Carbon\Carbon;

class ListingRepo extends Repo
{
    public function __construct(Listing $listing)
    {
        $this->model = $listing;
    }

    public function all()
    {
        return $this->model->with('images')->get();
    }

    public function findOrFail($id)
    {
        return $this->model->with('images')->findOrFail($id);
    }
}
