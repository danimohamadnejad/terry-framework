<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\ServiceContainer;

class InstantiateableMethod {
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
     if($reflection_class_object->hasMethod($this->name)){
      $reflection_method = $reflection_class_object->getMethod($this->name);
      $parameters_count = $reflection_method->getNumberOfParameters();
      if($parameters_count == 0) 
       return [];
      foreach($reflection_method->getParameters() as $index=>$param){
        $ParamClass = $param->getClass();
        $param_reflection_object = $param->getClass();
      } 
     }
     return [];
    }

}