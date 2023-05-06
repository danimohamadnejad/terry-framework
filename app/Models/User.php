<?php
namespace App\models;
class User{
    public $name;
    public $age;
    
    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
}