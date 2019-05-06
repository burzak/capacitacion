<?php

class Zoo {
    private $capacidad;
    private $animales= array();
    public function __construct($capacidad){
        $this->capacidad=$capacidad;
    }

    public function agregarAnimal($animal, $cantidad){
        if(!array_key_exists($animal, $this->animales)){
            $this->animales[$animal]=$cantidad;
        }else{
            $this->animales[$animal]+=$cantidad;
        }
    }

    public function sacarAnimal($animal, $cantidad){
        if(isset($this->animales[$animal])){
            unset($this->animales[$animal]);
        }
    }
}