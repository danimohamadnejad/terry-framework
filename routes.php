<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'products', 'alias'=>'products.'], function(){ 
    Route::get('', [HomeController::class, 'show_products'])->name('search');  /* /products */
    Route::group(['prefix'=>'{id}'], function(){                
     Route::get('', [HomeController::class, 'show_product'])->name('show');   /* /products/3 */
    });
});
Route::get('index', [HomeController::class, 'show_home']);     /* /index */
Route::group(['prefix'=>'users', 'alias'=>'users.'], function(){                  
    Route::get('', [HomeController::class, 'show_users'])->name('search');     /* /users */
    Route::group(['prefix'=>'{id}'], function(){               
        Route::get('', [HomeController::class, 'show_user'])->name('show');  /* /users/13 */ 
        Route::group(['prefix'=>'profile'], function(){
            Route::get('', [HomeController::class, 'show_user_profile'])->name('profile'); /* /users/13/profile */ 
        });
    });
});

/* 
Calling group methods on users: [ ['prefix'=>'users'], ['prefix'=>'{id'}], ['prefix'=>'profile'] ]
*/