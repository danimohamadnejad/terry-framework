<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::get("", [HomeController::class,'home']);
Route::group(['prefix'=>'site'], function(){
  Route::get("{name}", [HomeController::class, 'site_with_name']);
  Route::group(['prefix'=>'friends'], function(){
    Route::get("", [HomeController::class, 'friends']);
  });  
});