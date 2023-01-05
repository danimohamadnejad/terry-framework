<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::get("test/users", [HomeController::class, "show_users"]);
Route::get("test/news", [HomeController::class, "show_news"]);
Route::get('test/users/{id}', [HomeController::class, 'show_user']);
Route::get('test/reports/{year?}', [HomeController::class, 'show_reports']);
