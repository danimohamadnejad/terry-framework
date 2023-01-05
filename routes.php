<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
  Route::get("{name}", [HomeController::class, 'home']);
  Route::group(['prefix'=>'site'], function(){
    Route::get("{name}", [HomeController::class, 'index'])->name('index');
    Route::group(['prefix'=>'friends'], function(){
        Route::get("", [HomeController::class, 'index2'])->name('index2');
    });
  });
 