<?php
namespace App\Http\Controllers;
use App\Models\User;

class HomeController{
    public function index(){
    }
    public function home(){
      $dani = app()->make(User::class, ['danial', 29]);
      dd($dani);
    }
}