<?php
use Framework\Routing\Route;
use \App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'home']);
Route::group(['prefix'=>'site', 'alias'=>'site.'], function(){
    Route::group(['prefix'=>'products', 'alias'=>'products.'], function(){
        Route::get("", [HomeController::class, 'products'])->name('products-index');
        Route::group(['prefix'=>'amazon-products'], function(){
            Route::get("{name}", [HomeController::class, 'index'])->name('amazon-products-index');
        }); 
    });
});
 