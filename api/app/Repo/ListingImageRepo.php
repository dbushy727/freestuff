<?php

namespace App\Repo;

use App\Model\ListingImage;

class ListingImageRepo extends Repo
{
    public function __construct(ListingImage $listing_image)
    {
        $this->model = $listing_image;
    }
}
