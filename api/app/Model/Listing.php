<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public $fillable = [
        'name',
        'slug',
        'zip_code',
        'description',
        'is_active',
        'published_at',
    ];

    public $dates = ['published_at'];

    public $casts = ['is_active' => 'bool'];

    public function images()
    {
        return $this->hasMany('App\Model\ListingImage');
    }

    public function activate()
    {
        return $this->update(['is_active', true]);
    }

    public function deactivate($id)
    {
        return $this->update(['is_active', false]);
    }

    public function publish()
    {
        if ($this->published_at) {
            throw new Exception('Listing has already been published');
        }

        return $this->activate()->update(['published_at', Carbon::now()]);
    }
}
