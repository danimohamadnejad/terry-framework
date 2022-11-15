<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\InstantiateableMethod;
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
      $dani = InstantiateableMethod::make($class, $this);
      $dani->set_name("__construct")->prepare_arguments();
    }
    
}