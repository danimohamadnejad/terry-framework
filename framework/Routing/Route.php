<?php
namespace Framework\Routing;
class Route {
    private static $routes = [];

    public static function get($uri, $destination = [/* [controller, method] */]){
    }
    private static function create_instance(){
        return new self;    
    }
}