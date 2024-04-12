<?php
namespace Framework\Http;
use Framework\Routing\Route;

class Middleware{
  private static $instance = null;
  private $middleware_classes = [];
  private function __construct(){}
  
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Middleware();
    }
    return static::$instance;
  } 
  
  public function register($data = []){
    $this->middleware_classes = array_merge(
      $this->middleware_classes, $data
    );
    return $this;
  }
  public function run(Middleware $self = null){
    $self = !is_null($self) ? $self : static::instance();
    $next = null;
  }
  public function set_route(Route $route){
    $this->route = $route;
    return $this;
  }
}