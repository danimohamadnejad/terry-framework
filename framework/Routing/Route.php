<?php
namespace Framework\Routing;
use Framework\Http\Request;

class Route {
    private static $routes = [];
    private $controller_class = '';
    private $controller_method = '';
    private $name = '';
    private $uri_pattern = '';
    private $method = '';

    private function __construct(string $uri_pattern, array $destination = []){
        $this->uri_pattern = $uri_pattern;
        list($controller_class, $controller_method) = $destination;
        $this->controller_class = $controller_class;
        $this->controller_method = $controller_method;
    }
    public static function get(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::GET);
        static::store_route($route);
        return $route;
    }
    public static function post(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::POST);
        static::store_route($route);
        return $route;
    }
    public static function put(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::PUT);
        static::store_route($route);
        return $route;
    }
    public static function delete(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
        $route->method(Request::DELETE);
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
    public static function get_routes_by_method($method){
        return array_filter(static::$routes, function($route) use($method){
           return $route->get_method() == $method;  
        });
    }
    public function get_method(){
        return $this->method;
    }
}