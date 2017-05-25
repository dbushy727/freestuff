<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Repo\ListingRepo;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(ListingRepo $listings)
    {
        $this->listings = $listings;
    }

    public function index()
    {
        return $this->listings->all();
    }

    public function show($id)
    {
        return $this->listings->findOrFail($id);
    }

    public function store(CreateListingRequest $request)
    {
        return $this->listings->store($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->listings->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->listings->destroy($id);
    }

}
