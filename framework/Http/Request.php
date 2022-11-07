<?php
namespace Framework\Http;
class Request{
  private static $instance = null;
  public const GET = "GET";
  public const PUT = "PUT";
  public const POST = "POST";
  public const DELETE = "DELETE";
  
  private function __construct(){
  } 
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Request();
    }
    return static::$instance;
  } 
  public function uri(){
    return $_SERVER['REQUEST_URI'];
  }

  public function get_method(){
      
  }
  
  
}