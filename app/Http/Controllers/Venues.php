<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class Venues extends BaseAction
{
    public function __invoke(): JsonResponse
    {
        return DefaultResponse::success($this->venueRepositoryInterface->index(), 200);
    }
}
