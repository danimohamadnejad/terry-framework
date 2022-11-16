<?php
namespace App\Http\Controllers;
use Framework\Http\Request;
use App\PaymentMethods\PaymentMethod;

class HomeController{
    public function index(Request $req, PaymentMethod $payment_method){
        echo $payment_method->get_key();
    }
    public function home(){

    }
    public function index2(){
        
    }
}