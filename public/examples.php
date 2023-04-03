<?php
/* functions  */
function dd($var){
    var_dump($var);exit;
}
function printclassmethods($object){
        foreach(get_class_methods($object) as $method_name){
            echo "${method_name}<br/>";
        }
        exit;
}
/* game */
class Game{
    public Hero $hero;
    public function __construct(Hero $hero){
        $this->hero = $hero;
    }
    public function set_hero(Hero $hero){
        $this->hero = $hero;
        return $this;
    }
}

class Hero{
    public Gun $gun;
    public function __construct(Gun $gun){
     $this->gun = $gun;
    }
}

class Gun{
 public $shoot_mode = 1;
 public $bullets_count = 10;

}
/* end of game */
