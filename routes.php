<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::group(['prefix'=>'users'], function(){
 Route::get('', [HomeController::class, 'index'])->name('home');
});