<?php
namespace App\Http\Controllers;
use Framework\Http\Request;
use App\PaymentMethods\PaymentMethod;

class HomeController{
    public function index(Request $req, PaymentMethod $payment_method){
    }
    public function home(Request $req){
     $data = [
        ['id'=>2, 'name'=>'danial'], 
        ['id'=>3, 'name'=>'alex']
     ];
     return response()->view('users.users-list', ['users'=>$data,]);   
    }
    public function index2(){
    }
    public function show_user(user $user, $id){
    }
}