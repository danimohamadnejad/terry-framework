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
     /* now that we are here, it is obvious that $uri and $route_uri are not equal exactly.  */
     
     /* when we get here, we know that our request must match a route which is parametric
     which means one or more of it's sections contain  { and } */
 
     /* if number of sections in $uri is greater than number of sections in $route_uri, we can skip
      current route and go to next one using continue statement */
     $route_segments = $route->get_segements();
     if(count($uri_sections) > count($route_segments)){
       continue;
     }
     
     /* the technique we use here to find route is that we suppose we found route so we say $found_route
     equals current route */
     
     $found_route = $route;
     
     /* then we try to disprove it. if we can disprove it we can skip current route and go to next
     one and if we cant, then we just found it!!!!  */
     
     foreach($route_segments as $index=>$segment){
       
     }
     if($found_route)
     {
       break;
     }
    }
    return $found_route;
   }
}