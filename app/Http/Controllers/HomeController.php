<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;

class HomeController{
    public function index(){
    }
    public function home(){
      $add = new Address;
      $add->city = 'toronto';
      $terry = app()->make(User::class, ['danial', 29]);
      dd($terry->address->city);
    }
}