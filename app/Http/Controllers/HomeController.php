<?php
namespace App\Http\Controllers;
class HomeController{
    public function index($name){
        echo "hello ${name}";
    }
    
    public function index2(){
            echo "index 2 here";
    }

    public function home($name){
        echo $name;
    }
}