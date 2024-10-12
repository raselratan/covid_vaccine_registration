<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Repositories\Contracts\VenueRepositoryInterface;

class BaseAction  extends Controller{
    public function __construct(
        protected UserRepositoryInterface $userRepositoryInterface,
        protected VenueRepositoryInterface $venueRepositoryInterface,
    ){}
}