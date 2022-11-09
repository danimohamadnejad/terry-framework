<?php
namespace Framework\Routing;
use Framework\Routing\Route;

class RouteAttributeStack{
    private $attribute_stack = [];
    private static $instance = null;
    private ?Route $route = null;
    
    private function __construct(){

    }
    public static function instance(){
        if(is_null(static::$instance)){
            static::$instance = new RouteAttributeStack;
        }
        return static::$instance;
    }
    public function push(array $attributes){
     array_push($this->attribute_stack, $attributes);
     return $this;    
    }

    public function pop(){
     array_pop($this->attribute_stack);
     return $this;
    }
    public function set_route(Route $route){
        $this->route = $route;
        return $this;
    }
    
    public function run(){
     $this->use_prefixes();
    }
    private function use_prefixes(){
     $attribute_stack = $this->attribute_stack;
     foreach($attribute_stack as $attributes){
        
     }
     return $this;
    }
}