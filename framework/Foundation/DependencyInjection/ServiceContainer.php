<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\InjectionMethod;
use Framework\Http\Request;

class ServiceContainer{
    private static $instance = null;
    private array $bindings = [];

    private function __construct(){
      $this->register_default_bindings();
    }
    private function register_default_bindings(){ 
     $bindings = [
      Request::class=>function(){
       return Request::instance(); 
      }      
     ];
     foreach($bindings as $class=>$binding){
      $this->register_binding($class, $binding);
     }
     return $this; 
    }
    public function register_binding($class, $binding){
      if(!isset($this->bindings[$class])){
       $this->bindings[$class] = $binding; 
      }
      return $this;
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