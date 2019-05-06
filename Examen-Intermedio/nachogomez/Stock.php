<?php

class Stock {
  private $capacidadMaxima;
  private $contadorDeStock;
  private $productos=array();
  public function __construct($capacidadMaxima) {
    $this->capacidadMaxima=$capacidadMaxima;
    $this->contadorDeStock=$capacidadMaxima;
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {
    if(!isset($this->productos[$producto]) && $cantidad<=$this->contadorDeStock){
      $this->productos=array(
        'producto'=>$producto,
        'cantidad'=>$cantidad
      );
      $this->contadorDeStock-=$this->productos[$cantidad];
      return true;
    } else{
      $this->productos[$cantidad]+=$cantidad;
      return false;
    }
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {
    if(($this->productos[$cantidad]<$cantidad) || (!isset($this->productos[$producto]))){
      return false;
    }
    else {
      $this->productos[$cantidad]-=$cantidad;
      return true;
    }
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
    echo 'El producto' . $this->productos[$producto] . 'tiene: '. $this->productos[$cantidad] . 'en stock';
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {
    if($this->CapacidadRestante==0){
      echo 'El deposito esta vacio';
    }
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
    if($this->capacidadMaxima==$this->contadorDeStock){
      echo 'El deposito esta lleno';
    }
  }
}