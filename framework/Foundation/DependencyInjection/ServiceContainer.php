<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\ReflectionMethod;
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

    public function make(string $class){
      $dani = ReflectionMethod::make($class, $this);
      
    }
    
}