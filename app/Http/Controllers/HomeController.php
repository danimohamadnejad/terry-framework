<?php
namespace App\Http\Controllers;
use Framework\Http\Request;

class user{
 private profile $profile;
 public $id;
 public $name;
 public function __construct(profile $profile, $id, $name){
    $this->profile = $profile;
    $this->id = $id;
    $this->name = $name;
 }
 public function get_profile(){
    return $this->profile;
 }
}
class profile{
}
class HomeController{
    public function index($dani){
    }
    public function home(){
      $dani = app()->make(user::class, [1,2]);
      var_dump($dani->get_profile());
    }
}