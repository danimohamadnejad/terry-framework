<?php
use Framework\Routing\Route;
use \App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'home']);
Route::get('index', [HomeController::class, 'index']);
Route::get('index2', [HomeController::class, 'index2']);