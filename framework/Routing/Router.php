<?php
namespace Framework\Routing;
use Framework\Routing\Route;
use Framework\Http\Request;

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
    $routes = Route::get_routes_by_method(Request::instance()->get_method());
    if(empty($routes)){
     throw new \Exception("No route found");
    }
    $uri = Request::insance()->uri();
    $uri_sections = explode('/', $uri);
    $found_route = null;
    foreach($routes as $route){
     $route_uri = $route->get_uri_pattern();
     if($uri == $route_uri){
       return $route;
     }
   }
  }
}