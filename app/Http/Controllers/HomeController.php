<?php
namespace App\Http\Controllers;
class HomeController{
    public function index(){
    }
    public function show_users(){
        die('show users');
    }
    public function show_user(){
        die('show user');
    }
    public function show_news(){
        die('show news');
    }
    public function show_reports($year = null){
        die('show reports of '.$year);
    }
}