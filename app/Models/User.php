<?php
namespace App\models;
use App\Models\Address;

class User{
    public $name;
    public $age;
    public Address $address;

    public function __construct($name, $age, Address $address){
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
}