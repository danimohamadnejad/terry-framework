<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;
Route::get("users/{name}", [HomeController::class, "index"])->name('home');