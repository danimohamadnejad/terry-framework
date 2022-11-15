<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\InjectionMethod;
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

    public function make(string $class, array $args = []){
      $injection_method = InjectionMethod::make($class, $this);
      $args = $injection_method->set_custom_args($args)->set_name("__construct")->prepare_arguments();
      $reflection = new \ReflectionClass($class);
      return $reflection->newInstanceArgs($args);
    }
    
}