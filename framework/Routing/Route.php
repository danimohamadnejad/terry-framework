<?php
namespace Framework\Routing;
class Route {
    private static $routes = [];
    private $controller_class = '';
    private $controller_method = '';
    private $name = '';
    private $uri_pattern = '';

    private function __construct(string $uri_pattern, array $destination = []){
        $this->uri_pattern = $uri_pattern;
        list($controller_class, $controller_method) = $destination;
        $this->controller_class = $controller_class;
        $this->controller_method = $controller_method;
    }
    public static function get(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
    }
    public static function post(string $uri_pattern, array $destination){
        $route = static::create_instance($uri_pattern, $destination);
            
    }
    private static function create_instance(string $uri_pattern, array $destination){
        return new Route($uri_pattern, $destination);
    }
}