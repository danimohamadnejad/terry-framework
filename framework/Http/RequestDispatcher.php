<?php
namespace Framework\Http;
use Framework\Routing\Route;
use Framework\Http\Request;

class RequestDispatcher {
   
   public function dispatch(Route $route){
    $request_parameters = $route->extract_param_values_from_path(Request::instance()->uri());
    $ControllerClass = $route->get_controller_class();
    $controller_method = $route->get_controller_method();
    $controller_instance = new $ControllerClass;
    return call_user_func_array([$controller_instance, $controller_method], array_values($request_parameters));
   }
}