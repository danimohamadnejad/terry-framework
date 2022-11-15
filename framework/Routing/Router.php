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
   $uri = Request::instance()->uri();
   $uri_sections = explode("/", $uri);
   $found_route = null;
   foreach($routes as $route){
     $route_uri = $route->get_uri_pattern();
     if($route_uri === $uri){
      return $route;
     }
     $route_segments = $route->get_segments();
     if(count($uri_sections) > count($route_segments)){
      continue;
     }
     $found_route = clone $route;
     foreach($route_segments as $index=>$segment){
       $segment_in_uri = isset($uri_sections[$index]) ? $uri_sections[$index] : null;
       if(!$segment->is_parametric() && (is_null($segment_in_uri) || $segment_in_uri!==$segment->get_name())){
        $found_route = null;
        break;
       }else if(($segment->is_parametric() && !$segment->is_optional()) && is_null($segment_in_uri)){
        $found_route = null;
        break;
       }
     }
     if($found_route)
      return $found_route;
   }
   return null;
  }
}