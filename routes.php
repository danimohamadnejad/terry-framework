<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'site', 'alias'=>'site.'], function(){
    Route::group(['prefix'=>'users'], function(){
        Route::get('', ['','']);
    });
    Route::group(['prefix'=>'products'], function(){
        Route::get("", ["",""]);
        Route::group(['prefix'=>'amazon-products'], function(){
            Route::get("",["",""]);
            Route::get("amazon-primiers", ['','']);
        }); 
    });
});
 
 
foreach(Route::get_routes() as $route){

}