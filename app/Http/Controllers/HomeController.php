<?php
namespace App\Http\Controllers;
class user{
 private profile $profile;
 public $id;
 public $name;
 public function __construct($id, profile $profile, $name){
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
      $dani = app()->make(user::class, ['1000', 'danial']);
      var_dump($dani->get_profile());
    }
}