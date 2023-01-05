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
    /* now we compare request uri with uri of every single route and if match with one of them
     we stop comparing other routes and return matched route*/
    foreach($routes as $route){
     $route_uri = $route->get_uri_pattern();
     /* first we compare request uri and route uri equivalence. if they are equal, 
     then we found it!!!*/
     if($uri == $route_uri){
       return $route;
     }
   }
  }
}