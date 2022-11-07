<?php
namespace Framework;
use Framework\Http\Request;
use Framework\Routing\Router;

class Application{
  private static $instance = null;
  private $request_directed = false;

  private function __construct(){
  } 
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Application();
    }
    return static::$instance;
  } 
  public function router(){
    return Router::instance();
  }
  public function request(){
   return Request::instance(); 
  }
  private function load_routes(){
   require_once __DIR__.'/../routes.php'; 
  }
  public function run(){
   $this->load_routes(); 
   $route = $this->router()->find_route();
   /* $res = $this->request()->set_route($route)->send(); */
  }
}