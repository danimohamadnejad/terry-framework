<?php
namespace Framework\Foundation\View;
class View {
    protected array $data;
    protected string $view;
    protected $layout = '';

    public function data(array $data){
      $this->data = $data;
      return $this;  
    }
    public function view($view){
        $this->view = $view;
        return $this;
    }
    public function render(){
        return $this->build();
    }
    protected function build(){
     extract($this->data);
     ob_start();
     require_once (views_path(str_replace('.', '/', $this->view).'.php'));
     $view_content = ob_get_clean();
     if(isset($layout) && !empty($layout)){
        $layout_view = view($layout, ['view_content'=>$view_content]);
        unset($layout);
        return $layout_view->render();
     }
     return $view_content;
    }
    
}
