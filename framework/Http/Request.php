<?php
namespace Framework\Http;
class Request{
  private static $instance = null;
  public const GET = "GET";
  public const PUT = "PUT";
  public const POST = "POST";
  public const DELETE = "DELETE";
  private $method_key = '__method';

  private function __construct(){
  } 
  public static function instance(){
    if(is_null(static::$instance)){
        static::$instance = new Request();
    }
    return static::$instance;
  } 
  public function uri(){
    $uri = $_SERVER["REQUEST_URI"];
    $question_mark_position = strpos($uri, "?");
    if($question_mark_position!==false){
      $uri = substr($uri, 0, $question_mark_position);
    }
    return $uri;
  }
  
  public function get_method(){
   $method = $this->input($this->method_key);
   if(is_null($method) || !$this->validate_method($method)){
    return $this->get_default_method();
   }
   return $method;
  }
  public function get_possible_methods(){
    return [
      static::GET, static::POST, static::PUT, static::DELETE
    ];
  }
  public function get_default_method(){
    return static::GET;
  }
  private function validate_method($method){
    if(in_array($method, $this->get_possible_methods())){
      return true;
    }
    return false;
  }
  private function get_actual_method(){
   return strtolower($_SERVER['REQUEST_METHOD']);   
  }
  public function input($key = null){
    $actual_method = $this->get_actual_method();
    $data = [];
    if($actual_method == 'get'){
      $data = $_GET;
    }else {
      $data = $_POST;
    }
    if(is_null($key)){
      return $data;
    }
    if(isset($data[$key])){
      return $data[$key];
    }
    return null;
  }
}