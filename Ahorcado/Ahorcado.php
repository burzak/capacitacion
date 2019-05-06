  <?php

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

  public function dameIntentosRestantes() {
    return $this->intentos;
  }

  public function gano() {
    $count = 0;
    for($i=0; $i<strlen($this->palabra); $i++) {
      if (!empty($this->letras[ $this->palabra[$i] ])) {
        $count++;
      }
    }
    return $count == strlen($this->palabra);
  }
  
  public function perdio() {
    return $this->intentos == 0;
  }

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