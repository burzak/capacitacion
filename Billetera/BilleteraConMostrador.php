<?php

class BilleteraConMostrador {

  /**
   * @var Array
   */
  private $billetes = array();

  /**
   * @var Mostrador
   */
  private $mostrador;

  public function __construct(Mostrador $mostrador) {
    $this->mostrador = $mostrador;
  }

  function agregar($billete, $cantidad) {
    if (!isset($this->billetes[$billete])) {
      $this->billetes[$billete] = 0;
    }
    $this->billetes[$billete] = $this->billetes[$billete] + $cantidad;
    return true;
  }

  function sacar($billete, $cantidad) {
    if (empty($this->billetes[$billete])) {
      // si esta vacio este billete devuelvo falso
      return false;
    }
    if ($this->billetes[$billete] < $cantidad) {
      return false;
    }
    $this->billetes[$billete] = $this->billetes[$billete] - $cantidad;
    return true;
  }

  function mostrar() {
    return $this->mostrador->mostrar($this->billetes);
  }
}