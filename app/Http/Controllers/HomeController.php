<?php
namespace App\Http\Controllers;
use Framework\Http\Request;
use App\PaymentMethods\PaymentMethod;

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
    public function index(){
      $req = app()->make(Request::class);
      var_dump($req);
    }
    public function home(){
      $user = app()->make(user::class, [1,2]);
      var_dump($user);
    }
    public function index2(){
      $object = app()->make(PaymentMethod::class);
      echo $object->get_key(); 
    }
}