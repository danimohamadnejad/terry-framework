<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'products',], function(){ 
    Route::get('', [HomeController::class, 'show_products']);
    Route::group(['prefix'=>'{id}'], function(){
        Route::get('', [HomeController::class, 'show_product']);
    });
});
Route::group(['prefix'=>'users'], function(){
    Route::get('', [HomeController::class, 'show_users']);
    Route::group(['prefix'=>'{id}'], function(){
        Route::get('', [HomeController::class, 'show_user']);
        Route::group(['prefix'=>'profile'], function(){
            Route::get('', [HomeController::class, 'show_user_profile']);
        });
    });
});

/* 
Calling group methods on users: [ ['prefix'=>'users'], ['prefix'=>'{id'}], ['prefix'=>'profile'] ]
*/