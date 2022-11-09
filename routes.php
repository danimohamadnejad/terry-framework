<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'site', 'alias'=>'site.'], function(){
    Route::get('users', ['',''])->name('users');
});
 
 
foreach(Route::get_routes() as $route){
 echo $route->get_name()."<br/>"; 
}