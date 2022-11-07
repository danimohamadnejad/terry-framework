<?php
namespace Framework\Routing;
use Framework\Routing\Route;

class Router{
  private static $instance = null;
  
  private function __construct(){
  } 
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Router();
    }
    return static::$instance;
  } 
  
  public function find_route(){
   
  }
}