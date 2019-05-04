<?php

include './vendor/autoload.php';
include 'Drone.php';

use PHPUnit\Framework\TestCase;


/**
 * Tenemos un drone para vigilar un country. El drone
 * tiene una bateria fija y gasta bateria por cada movimiento
 * que hace. Por default el drone arranca en la posicion 0,0 y con
 * la bateria llena.
 * 
 * Tambien guardamos el historial de movimientos. El drone
 * no se mueve a menos que tenga una cantidad suficiente
 * de bateria.
 * 
 * El drone se carga la bateria cuando vuelve al punto central
 * que es la posicion 0,0 .
 * 
  * Si tiene suficiente bateria se mueve a la posicion
 * que le pasas.
 * 
 * Se resta un punto de bateria por cada posicion en x
 * y un punto de bateria por cada posicion en y.
 * 
 * Por ej:
 *  - Si esta en la posicion 0,0 y movemos a 2,5 entonces
 *    gastamos 7 puntos de bateria.
 *  - Si estas en la posicion 2,5 y nos movemos a la posicion
 *    5,5 gastamos gastamos 3 puntos de bateria.
 * 
 * Historial de todos los movimientos del drone
 * 
 * 
public function __construct($tamanioTanque)
public function cantidadDeBateria()
public function mover($x, $y)
public function historial()
 */

final class DroneTest extends TestCase
{   
  public function testClaseExiste()
  {
    $this->assertTrue(class_exists('Drone'));
  }
    
  public function testDroneBateriaVacia() 
  {
    $drone = new Drone(0);
    $this->assertEquals(0, $drone->cantidadDeBateria());
  }

  public function testCrearDroneConBateriaNegativa()
  {
    $drone = new Drone(-10);
    $this->assertEquals(-10, $drone->cantidadDeBateria());
  }

  public function testPuedoCargarElRobot() 
  {
    $drone = new Drone(10);
    $drone->mover(2,2);
    $drone->mover(0,0);
    $this->assertEquals(10, $drone->cantidadDeBateria());
  }


  public function testDroneNoSePuedeMoverSiNoEstaCargado() 
  {
    $drone = new Drone(10);
    $drone->mover(2,2);
    $drone->mover(4,4);
    $this->assertFalse($drone->mover(8,8));
  }

  public function testRobotSePuedeMover() 
  {
    $drone = new Drone(1000);
    $this->assertTrue($drone->mover(10, 10));
    $this->assertTrue($drone->mover(11, 11));
    $this->assertTrue($drone->mover(15, 15));
    $this->assertTrue($drone->mover(20, 20));
    $this->assertTrue($drone->mover(15, 15));
    $this->assertTrue($drone->mover(0, 0));

  }

  public function testRobotSePuedeMoverEnNegativo() 
  {
    $drone = new Drone(1000);
    $this->assertTrue($drone->mover(-10, -10));
    $this->assertTrue($drone->mover(-11, -11));
    $this->assertTrue($drone->mover(-15, -15));
    $this->assertTrue($drone->mover(-20, -20));
    $this->assertTrue($drone->mover(-15, -15));
  }

  public function testMoverAMismoLugarNoDescuentaBateria()
  {
    $drone = new Drone(100);
    $drone->mover(10, 10);
    $this->assertEquals(80, $drone->cantidadDeBateria());
    $drone->mover(10, 10);
    $this->assertEquals(80, $drone->cantidadDeBateria());

  }

  public function testComprobarHistorial()
  {
    $drone = new Drone(1000);
    $drone->mover(10, 10);
    $this->assertEquals([['x'=> 10,'y' => 10]], $drone->historial());
    $drone->mover(11, 11);
    $this->assertEquals([['x'=>10,'y' =>10],['x'=>11,'y' =>11]]   , $drone->historial());
    $drone->mover(15, 15);
    $this->assertEquals([['x'=>10,'y' =>10],['x'=>11,'y' =>11],['x'=>15,'y' =>15]], $drone->historial());
    $drone->mover(20, 20);
    $this->assertEquals([['x'=>10,'y' =>10],['x'=>11,'y' =>11],['x'=>15,'y' =>15],['x'=>20,'y' =>20]], $drone->historial());
    $drone->mover(15, 15);
    $this->assertEquals([['x'=>10,'y' =>10],['x'=>11,'y' =>11],['x'=>15,'y' =>15],['x'=>20,'y' =>20],['x'=>15,'y' =>15]], $drone->historial());
    $drone->mover(0, 0);
    $this->assertEquals([['x'=>10,'y' =>10],['x'=>11,'y' =>11],['x'=>15,'y' =>15],['x'=>20,'y' =>20],['x'=>15,'y' =>15],['x'=>0,'y' =>0]], $drone->historial());


    

  }

}