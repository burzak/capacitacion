<?php
<<<<<<< HEAD
 
=======

>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
class Ahorcado {
  private $palabra;
  private $letras = array();
  private $intentos;
 
  public function __construct($palabra, $intentos) {
    $this->palabra = $palabra;
    $this->intentos = $intentos;
  }
  public function damePalabra() {
    return $this->palabra;
  }
<<<<<<< HEAD
 
=======

>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
  public function pasarLetra($letra) {
    if (!empty($this->letras[$letra])) {
      $this->intentos--;
      return false;
    }
    $this->letras[$letra] = 1;
    if (strpos($this->palabra, $letra) === false) {
      $this->intentos--;
      return false;
    }
    return true;
  }
<<<<<<< HEAD
 
  public function dameIntentosRestantes() {
    return $this->intentos;
  }
 
=======

  public function dameIntentosRestantes() {
    return $this->intentos;
  }

>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
  public function gano() {
    $count = 0;
    for($i=0; $i<strlen($this->palabra); $i++) {
      if (!empty($this->letras[ $this->palabra[$i] ])) {
        $count++;
      }
    }
    return $count == strlen($this->palabra);
  }
<<<<<<< HEAD
 
  public function perdio() {
    return $this->intentos == 0;
  }
 
=======
  
  public function perdio() {
    return $this->intentos == 0;
  }

>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
  public function mostrar() {
    $mostrar = "";
    for($i=0; $i<strlen($this->palabra); $i++) {
      if (empty($this->letras[ $this->palabra[$i] ])) {
        $mostrar .= ' _ ';
      } else {
        $mostrar .= ' ' . $this->palabra[$i] . ' ';
      }
    }
    return $mostrar;
  }
}