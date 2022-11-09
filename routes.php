<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'users'], function(){
    Route::group(['prefix'=>"iran-users"], function(){
        Route::get('{city?}', ['daw','daw']);
    });
});