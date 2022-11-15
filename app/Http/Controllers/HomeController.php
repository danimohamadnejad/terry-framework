<?php
namespace App\Http\Controllers;
class user{
 private profile $profile;
 public function __construct(nt $profile){
    $this->profile = $profile;
 }
}
class profile{
 
}
class HomeController{
    public function index($dani){
    }
    public function home(){
        echo app()->make(user::class);
    }
}