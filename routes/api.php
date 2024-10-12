<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (){
    return "Hi";
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
