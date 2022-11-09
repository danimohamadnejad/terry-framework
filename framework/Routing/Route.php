<?php
namespace Framework\Routing;
use Framework\Http\Request;
use Framework\Routing\RouteSegment;
use Framework\Routing\RouteAttributeStack;

class Route {
    private static $routes = [];
    private $controller_class = '';
    private $controller_method = '';
    private $name = '';
    private $uri_pattern = '';
    private $method = '';
    private $segments = [];

    private function __construct(string $uri_pattern, array $destination = []){
        $this->uri_pattern = $uri_pattern;
        list($controller_class, $controller_method) = $destination;
        $this->controller_class = $controller_class;
        $this->controller_method = $controller_method;
        RouteAttributeStack::instance()->set_route($this)->run();
    }
    public static function get(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::GET);
        $route->set_segments();
        static::store_route($route);
        return $route;
    }
    public static function post(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::POST);
        $route->set_segments();
        static::store_route($route);
        return $route;
    }
    public static function put(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::PUT);
        $route->set_segments();
        static::store_route($route);
        return $route;
    }
    public static function delete(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::DELETE);
        $route->set_segments();
        static::store_route($route);
        return $route;
    }
    private static function create_instance(string $uri_pattern, array $destination){
        return new Route($uri_pattern, $destination);
    }
    public function name($name){
        $this->name = $name;
        return $this;
    }
    private static function store_route(Route $route){
        static::$routes[] = $route;
    }
    public static function get_routes(){
        return static::$routes;
    }
    public function method($method){
        $this->method = $method;
        return $this;
    }
    public function get_method(){
        return $this->method;
    }
    public static function get_routes_by_method($method){
        return array_filter(static::$routes, function($route) use($method){
           return $route->get_method() == $method;  
        });
    }
    public function get_uri_pattern(){
        return trim($this->uri_pattern, "/");
    }
    private function set_segments(){
        $uri = $this->get_uri_pattern();
        $segments = explode('/', $uri);
        foreach($segments as $segment){
         $segment = RouteSegment::create_instance($segment);
         $this->segments[] = $segment;
        }        
    }
    public function get_segments(){
        return $this->segments;
    }
    public function extract_param_values_from_path(string $path){
     $path_segments = explode('/', $path);
     $out = [];
     foreach($this->get_segments() as $index=>$segment){
      if($segment->is_parametric() && isset($path_segments[$index])){
        $out[$segment->get_name()] = $path_segments[$index];
      }  
     }
     return $out;
    }

    public function get_controller_class(){
        return $this->controller_class;
    }
    public function get_controller_method(){
        return $this->controller_method;
    }
    public static function group(array $attributes, \Closure $closure){
       $attribute_stack = RouteAttributeStack::instance();
       $attribute_stack->push($attributes);
       $closure();
       $attribute_stack->pop();
    }
    
}