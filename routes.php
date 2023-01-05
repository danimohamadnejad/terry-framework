<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::get("users", [HomeController::class, "show_users"]);
Route::get("news", [HomeController::class, "show_news"]);
