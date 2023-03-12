<?php
namespace App\Http\Controllers;
class HomeController{
    public function show_products(){
        die('products');
    }
    public function show_product($id){
        die('product: '.$id);
    }
    public function show_users(){
        die('users');
    }
    public function show_user($id){
        die("user: ".$id);
    }
    public function show_user_profile($id){
        die("profile of user with id: ".$id);
    }
    public function show_home(){
        die('this is home');
    }
}