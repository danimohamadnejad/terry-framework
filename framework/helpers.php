<?php
use Framework\Foundation\Application;

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