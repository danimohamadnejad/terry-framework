<?php
namespace Framework\Foundation\DependencyInjection;
use Framework\Foundation\DependencyInjection\ServiceContainer;
use \ReflectionClass;

class ReflectionMethod {
    private string $class;
    private ServiceContainer $service_container;
    private string $method_name;

    private function __construct(string $class, ServiceContainer $service_container){
        $this->class = $class;
        $this->service_container = $service_container;
        
    }
    public static function make(string $class, ServiceContainer $service_container){
     $Self = get_called_class();
     return new $Self($class, $service_container);
    }

    public function set_method_name(string $method_name){
        $this->method_name = $method_name;
        return $this;
    }
}