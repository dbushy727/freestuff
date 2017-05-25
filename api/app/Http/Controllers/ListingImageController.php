<?php

namespace App\Http\Controllers;

use App\Repo\ListingImageRepo;
use Illuminate\Http\Request;

class ListingImageController extends Controller
{
    public function __construct(ListingImageRepo $listing_images)
    {
        $this->listing_images = $listing_images;
    }

    public function index()
    {
        return $this->listing_images->all();
    }

    public function show($id)
    {
        return $this->listing_images->findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'listing_id' => 'required|exists:listings,id',
            'path'       => 'required|active_url'
        ]);

        return $this->listing_images->store($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->listing_images->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->listing_images->destroy($id);
    }
}
