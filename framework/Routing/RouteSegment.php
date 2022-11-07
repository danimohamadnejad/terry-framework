<?php
namespace Framework\Routing;
class RouteSegment{
 
    private $name = '';
    private $is_paramertic = false;
    private $is_optional = false;
    private $segment_string = '';

    private function __construct(){
        
    }
    public static function create_instance(string $segment_string){
     $instance = new self;
     $instance->segment_string = $segment_string;
     $instance->parse();
     return $instance;
    }
    private function parse(){
        $name = $this->segment_string;
        $name = str_replace("}", "", $name);
        $name = str_replace("{", "", $name);
        $name = str_replace("?", "", $name);
        $this->name = $name;
        $this->is_parametric = strpos($this->segment_string, "{")!==false && strpos($this->segment_string, "}")!==false;
        $this->is_optional = $this->is_parametric && strpos($this->segment_string, "?")!==false;
    }
    public function is_parametric(){
        return $this->is_paramertic;
    }
    public function is_optional(){
        return $this->is_optional;
    }

    public function get_name(){
        return $this->name;
    }
}