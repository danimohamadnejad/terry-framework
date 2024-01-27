<?php
namespace Core\Http\Responses;
use Core\Http\Response;

class ViewResponse extends Response{
    private $data;
    private $view;
    private $layout=null;
    private static $sharedData=[];

    public function data(array $data){
        $this->data=$data;
        return $this;
    }

    public static function share($name, $value){
        static::$sharedData[$name]=$value;
    }

    public function view(string $view){
        $this->view=$view;
        return $this;
    }

    public function render(){
        $view=$this->build();
        echo $view;
    }
    public function get(){
        $view=$this->build();
        return $view;
    }
    public function build(){
     $out=null;
     extract($this->data);
     extract(static::$sharedData);
     ob_start();
     require ROOT.'/App/views/'.str_replace('.','/',$this->view).'.php';
     $view_content=ob_get_clean();
     if(isset($layout) && !empty($layout)){
        require ROOT.'/App/views/'.str_replace('.','/',$layout).'.php';    
        $layout_content=ob_get_clean();
        $out=$layout_content;
     }else{
        $out=$view_content;
     }
     return $out;
    }
    
}

 
