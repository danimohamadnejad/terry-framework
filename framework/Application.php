<?php
namespace Framework;
use Framework\Http\Request;
class Application{
  private static $instance = null;
  private function __construct(){

  } 
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Application();
    }
    return static::$instance;
  } 
  
  public function request(){
   return Request::instance(); 
  }
  
  public function run(){
    
  }
}