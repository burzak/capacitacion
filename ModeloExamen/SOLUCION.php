<?php

class Robot {
  
  private $_bateria = 0;
  private $x = 0;
  private $y = 0;

  public function cargar() {
    $this->_bateria = 100;
  }

  public function bateria() {
    return $this->_bateria;
  }

  public function posicionX() {
    return $this->x;
  }

  public function posicionY() {
    return $this->y;
  }

  public function mover($x, $y) {
    if ($this->_bateria - 10 < 0) {
      return false;
    }
    $this->x = $x;
    $this->y = $y;
    $this->_bateria -= 10;
    return true;
  }
}