<?php
namespace Framework\Http;
use Framework\Http\Response;
use Framework\Foundation\View\View;

class ViewResponse extends Response{
    protected View $view;

    public function send(){
      echo $this->view->render();  
    }
    public function view(View $view){
        $this->view = $view;
        return $this;
    }
}