<?php
namespace Framework\Foundation;
use Framework\Foundation\Application;

abstract class ServiceProvider {
    public abstract function boot();
    protected Application $app;
    private static function get_providers_namespace(){
        return "App\Providers";
    }
    private function set_app(Application $app){
        $this->app = $app;
        return $this;
    }
    private static function get_provider_classes(){
      $files = providers_path();
      $dir = opendir($files);
      $out = [];
      $providers_namespace = static::get_providers_namespace();
      while($file = readdir($dir)){
        if($file=='.' || $file == ".."){
            continue;
        }
        $class = substr($file, 0, strpos($file, '.php'));
        $class = "${providers_namespace}\\${class}";
        array_push($out, $class);
      }  
      return $out;
    }
    public static function load_providers(){    
      $provider_classes = static::get_provider_classes();  
      foreach($provider_classes as $Class){
        $instance = new $Class;
        $instance->set_app(app());
        $instance->boot();
      }
    }
}