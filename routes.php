<?php
use Framework\Routing\Route;
use \App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'home'])
 ->middleware(['goodprint', 'niceprint']);
Route::get('index', [HomeController::class, 'index']);
Route::get('index2', [HomeController::class, 'index2']);
Route::get('users/{user}', [HomeController::class, 'show_user']);