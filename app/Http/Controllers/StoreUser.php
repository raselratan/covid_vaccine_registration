<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultResponse;
use App\Http\Requests\UserRequest;
use App\Jobs\ScheduleVaccine;
use Illuminate\Http\JsonResponse;

class StoreUser extends BaseAction 
{
    public function __invoke(UserRequest $request):JsonResponse
    {
        $user = $this->userRepositoryInterface->create($request->validated()); 
        
        ScheduleVaccine::dispatch($user);

        return DefaultResponse::success($user, 201);
    }
}