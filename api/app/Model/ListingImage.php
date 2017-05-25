<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    public $fillable = ['listing_id', 'path'];

    public function listing()
    {
        return $this->belongsTo('App\Model\Listing');
    }
}
