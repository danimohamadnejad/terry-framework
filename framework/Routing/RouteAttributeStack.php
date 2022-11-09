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
     $this->use_prefixes()->use_aliases();
    }
    
    private function use_aliases(){
      $attribute_stack = array_filter($this->attribute_stack, function($d){
        return isset($d['alias']) && !empty($d['alias']);
      });
      if(!count($attribute_stack))
       return $this;
      $route_name = "";
      foreach($attribute_stack as $attributes){
        $route_name.=$attributes['alias'];
      }
      $this->route->name($route_name.$this->route->get_name());
      return $this;
    }

    private function use_prefixes(){
     $attribute_stack = array_filter($this->attribute_stack, function($attributes){
        return isset($attributes['prefix']) && !empty($attributes['prefix']);
     });
     if(!count($attribute_stack))
      return $this;
     $uri = '';
     foreach($attribute_stack as $attributes){
      if(isset($attributes['prefix']) && !empty($attributes['prefix'])){
       $prefix = trim($attributes['prefix'], '/');
       $uri.=$prefix.'/';
      }  
     }
     $route_uri = $this->route->get_uri_pattern();
     if(!empty($route_uri))
      $uri.=$route_uri;
     $this->route->set_uri_pattern($uri); 
     return $this;
    }
}