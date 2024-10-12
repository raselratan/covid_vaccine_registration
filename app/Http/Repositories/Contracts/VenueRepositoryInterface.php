<?php

namespace App\Http\Repositories\Contracts;

interface VenueRepositoryInterface
{
    /**
     * @return array
     */
    public function index() : array;

        /**
     * @return object
     */
    public function find(int $id) : object;

}
