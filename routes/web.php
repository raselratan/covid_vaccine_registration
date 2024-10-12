<?php

use Illuminate\Support\Facades\Route;

$namespace = 'App\Http\Controllers';

Route::group(['namespace' => $namespace], function(){
    Route::get("/", 'Index')->name('index');
    Route::post('/store-user', 'StoreUser')->name('storeUser');
    Route::get("/search", 'Search')->name('search');
    Route::get("/search/{nid}", 'SearchSchedule')->name('search-schedule');
    Route::get("/venues", 'Venues')->name('venues');
});