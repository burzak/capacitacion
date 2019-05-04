<?php

/**
 * Como programadores de Global HITSS debemos ser capaces de programar
 * un robot. Nuestro robot va a tener una bateria y cada vez que
 * nos movemos vamos a gastar algo de bateria. Lo bueno es que
 * somos tan buenos programadores que nuestro robot es un robot
 * cuantico que cada vez que se mueve gasta una cantidad fija
 * de bateria porque el robot hace saltos cuanticos. Nuestra
 * tecnologia cuantica gasta MUCHA bateria y cada vez que salta
 * gasta 10 puntos de bateria. Lamentablemente nuestra tecnologia para
 * baterias es bastante mala (porque no podemos ser buenos en todo)
 * y solo tenemos 100 de bateria. La otra limitacion es que el robot
 * siempre arranca en la posicion (0, 0) que en nuestro caso
 * son las oficinas el punto central del universo. Apartir de ahí
 * se puede mover donde quieran.
 * 
 * Metodos:
 *    - cargar:
 *        Carga al 100% nuestra bateria, osea carga los 100puntos
 *        de bateria
 *    - bateria:
 *        Nos dice cuantos puntos de bateria tenemos
 *    - posicionX:
 *        Nos dice en que posicion X del universo estamos. Recuerden
 *        que el universo esta centrado en las oficinas de Global HITSS.
 *    - posicionY:
 *        Nos dice en que posicion Y del universo estamos.
 *    - mover(x, y):
 *        Hacemos un salto cuantico a las posiciones X e Y del universo
 * 
 */

class Robot 
{
  private $bateria;
  private $posicionX;
  private $posicionY;

  public function __construct()
  {
    
    $this->posicionX = 0;
    $this->posicionY = 0;
  }

  public function cargar() 
  {
    $this->bateria = 100;
  }

  public function bateria() 
  {
    return $this->bateria;
  }

  public function posicionX() 
  {
    return $this->posicionX;
  }

  public function posicionY() 
  {
    return $this->posicionY;
  }

  public function mover($x, $y) 
  {
    if($this->bateria >= 10)
    {
      $this->posicionX = $x;
      $this->posicionY = $y;
      $this->bateria -= 10;
      return true;
    }
    return false;
  }
}