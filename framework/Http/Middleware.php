<?php
namespace Framework\Http;
use Framework\Routing\Route;

class Middleware{
  private static $instance = null;
  private $middleware_classes = [];
  public $current_middleware_index = -1;
  private Route $route;

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
  public function run(Middleware $self = null, array $route_middlewares = []){
    $this->current_middleware_index++;
    $self = !is_null($self) ? $self : static::instance();
    $next = null;
    $route_middlewares = !empty($route_middlewares) ? $route_middlewares : 
     $this->route->get_middleware_names();
    if((count($route_middlewares) - $this->current_middleware_index) == 2){
     /* next will be run method of this class */ 
     $next = function() use($self, $route_middlewares){
      array_shift($route_middlewares);
      return call_user_func_array([$self, 'run'], [$self, $route_middlewares]);
     };
    }else{
     /* next will be request dispatcher method */
     $route = $this->route;
     $request = app()->request(); 
     $next = function() use($route, $request){
      return $request->dispatch($route);
     };
    }
    $middleware_name = current($route_middlewares);
    $middleware_instance = new $this->middleware_classes[$middleware_name];
    return call_user_func_array([$middleware_instance, 'handle'], [app()->request(), $next]);
  }
  public function set_route(Route $route){
    $this->route = $route;
    return $this;
  }
}