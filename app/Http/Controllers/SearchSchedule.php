<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultResponse;
use Illuminate\Http\JsonResponse;

class SearchSchedule extends BaseAction
{
    public function __invoke($nid) : JsonResponse
    {
        $userSchedule = $this->userRepositoryInterface->userByNid($nid);

        return DefaultResponse::success($userSchedule);
    }
}
