<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\ServiceContainer;

class InjectionMethod {
    private string $class;
    private ServiceContainer $service_container;
    private string $name;
    private \ReflectionClass $reflection_class_object;
    private array $custom_args = [];
    
    private function __construct(string $class, ServiceContainer $service_container){
        $this->class = $class;
        $this->service_container = $service_container;
        $this->reflection_class_object = new \ReflectionClass($class);
    }

    public static function make(string $class, ServiceContainer $service_container){
     $Self = get_called_class();
     return new $Self($class, $service_container);
    }

    public function set_name(string $name){
        $this->name = $name;
        return $this;
    }

    public function set_custom_args(array $custom_args){
       $this->custom_args = $custom_args;
       return $this; 
    }

    public function prepare_arguments(): array {
     $reflection_class_object = $this->reflection_class_object;
     $out = []; 
     if($reflection_class_object->hasMethod($this->name)){
      $reflection_method = $reflection_class_object->getMethod($this->name);
      $parameters_count = $reflection_method->getNumberOfParameters();
      if($parameters_count == 0) 
       return $out;
      $custom_args = $this->custom_args;
      foreach($reflection_method->getParameters() as $index=>$param){
        $param_reflection_object = $param->getClass();
        if(is_null($param_reflection_object) && !empty($custom_args)){
         $out[] = current($custom_args);
         array_shift($custom_args);
        }else if(!is_null($param_reflection_object)){
         $arg = null;
         if(!empty($custom_args)){
            $custom_arg = current($custom_args);
            if(is_object($custom_arg) && get_class($custom_arg) == $param_reflection_object->name){
             $arg = $custom_arg;
             array_shift($custom_args);   
            } 
         }
         if(is_null($arg)){
            if(!$param->allowsNull()){
                $arg = $this->service_container->make($param_reflection_object->getName());
             }   
         }
         $out[] = $arg;
        }
      } 
     }
     return $out;
    }

}