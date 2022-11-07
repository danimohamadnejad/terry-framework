<?php
use Framework\Routing\Route;
use App\Http\Controllers\HomeController;

Route::get("", [HomeController::class, "index"])->name('home');