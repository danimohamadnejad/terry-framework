<?php
namespace Framework\Foundation;
use Framework\Http\Request;
use Framework\Routing\Router;
use Framework\Foundation\ServiceProvider;

class Application{
  private static $instance = null;

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
   require_once __DIR__.'/../../routes.php'; 
  }
  public function run(){
   $this->load_routes(); 
   $route = $this->router()->find_route();
   if(is_null($route)){
    throw new \Exception("Route not found");
   }
   $this->request()->dispatch($route);
   /* $res = $this->request()->set_route($route)->send(); */
  }
  public function load_service_providers(){
    ServiceProvider::load_providers();
    return $this;
  }
}