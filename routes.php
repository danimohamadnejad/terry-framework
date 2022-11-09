<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;

Route::group(['prefix'=>'site', 'alias'=>'site.'], function(){
    Route::group(['prefix'=>'products.'], function(){
        Route::group(['prefix'=>'amazon-products.'], function(){
            Route::get("{name}", [HomeController::class, 'index']);
        }); 
    });
});
 
 