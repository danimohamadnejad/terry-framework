<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'products',], function(){ 
    Route::get('', [HomeController::class, 'show_products']);  /* /products */
    Route::group(['prefix'=>'{id}'], function(){                
     Route::get('', [HomeController::class, 'show_product']);   /* /products/3 */
    });
});
Route::get('index', [HomeController::class, 'show_home']);     /* /index */
Route::group(['prefix'=>'users'], function(){                  
    Route::get('', [HomeController::class, 'show_users']);     /* /users */
    Route::group(['prefix'=>'{id}'], function(){               
        Route::get('', [HomeController::class, 'show_user']);  /* /users/13 */ 
        Route::group(['prefix'=>'profile'], function(){
            Route::get('', [HomeController::class, 'show_user_profile']); /* /users/13/profile */ 
        });
    });
});

/* 
Calling group methods on users: [ ['prefix'=>'users'], ['prefix'=>'{id'}], ['prefix'=>'profile'] ]
*/