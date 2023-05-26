<?php
namespace App\models;
use App\Models\Address;

class User{
    public $name;
    public $age;
    public ?Address $address = null;

    public function __construct(Address $address, $name, $age){
        $this->name = $name;    
        $this->age = $age;
        $this->address = $address;
    }

}