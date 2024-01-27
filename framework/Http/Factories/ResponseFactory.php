<?php
namespace Framework\Http\Factories;
use Framework\Http\ViewResponse;
use Framework\Foundation\View\View;

class ResponseFactory {
    public function view($view, array $data = []){
        $view_object = app()->make(View::class)->view($view)->data($data);
        return app()->make(ViewResponse::class)->view($view_object);
    }
}