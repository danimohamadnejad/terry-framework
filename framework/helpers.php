<?php
use Framework\Foundation\Application;
use Framework\Http\Factories\ResponseFactory;
use Framework\Foundation\View\View;

function providers_path(){
    return app_path().'/Providers'; 
}

function base_path($append = ''){
    $out = __DIR__;
    $out = str_replace("\\", "/", $out);
    $out = substr($out, 0, strrpos($out, "/framework"));
    if(!empty($append)){
     $out.="/${append}";
    }
    return $out;
}

function app_path(){
    return base_path()."/app";
}
function app(){
 return Application::instance();
}
function dd($var){
    var_dump($var);
    exit;
}
function response(){
    return app()->make(ResponseFactory::class);
}
function views_path($path = ''){
    return base_path("resources/views/{$path}");
}
function resources_path($path = ''){
    return base_path("resources/{$path}");
}
function view($view, array $data = []){
    return app()->make(View::class)->data($data)->view($view);
}
function host(){
    $protocol = strtolower($_SERVER['SERVER_PROTOCOL']);
    $protocol = substr($protocol, 0, strrpos($protocol, '/'));
    $host = strtolower($_SERVER['HTTP_HOST']);
    return $protocol.'://'.$host;
}
function public_url($path){
  return host()."/{$path}";      
}