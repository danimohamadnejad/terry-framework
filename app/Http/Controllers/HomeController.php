<?php
namespace App\Http\Controllers;
use Framework\Http\Request;
use App\PaymentMethods\PaymentMethod;

class HomeController{
    public function index(Request $req, PaymentMethod $payment_method){
    }
    public function home(){
    }
    public function index2(){
    }
    public function show_user(user $user, $id){
        var_dump($user);
        var_dump($id);
    }
}