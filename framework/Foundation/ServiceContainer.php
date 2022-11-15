<?php
namespace Framework\Foundation;
class ServiceContainer{
    private static $instance = null;
    private function __construct(){

    }
    public static function instance(){
      if(is_null(static::$instance)){
        static::$instance = new ServiceContainer;
      } 
      return static::$instance; 
    }
    
}