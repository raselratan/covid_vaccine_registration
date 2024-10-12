<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\VenueRepositoryInterface;
use App\Models\Venue;

class VenueRepository implements VenueRepositoryInterface
{
    /**
     * @return array
     */
    public function index() : array
    {
        return Venue::get()->toArray();
    }

     /**
     * @return object
     */
    public function find(int $id) : object
    {
        return Venue::find($id);
    }
}
