<?php
<<<<<<< HEAD

require_once('./vendor/autoload.php');

=======
/**
 * 
 * Tareas:
 *  - Bajar composer
 *  - Instalar phpunit
 *  - Revisar los tests
 *  - Leer la explicación de la clase
 *  - Que pasen los tests
 *  - Conquistar el mundo
 *  - Aprobar el curso!
 * 
 */
include './vendor/autoload.php';
>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
include 'Drone.php';

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
<<<<<<< HEAD
    public function existeDrone()
    {
        $this->assertTrue(class_exists("Drone"));
    }

    public function construirDrone()
    {
        $drone = new Drone(10);
        return $drone;
    }

    public function testMover()
    {
        $drone=$this->construirDrone();
        $this->assertTrue($drone->mover(2,2));
    }

    public function testMoverSinBateria()
    {
        $drone=$this->construirDrone();
        $this->assertTrue($drone->mover(8,2));
        $this->assertFalse($drone->mover(1,0));

    }

    public function testCantidadDeBateria()
    {
        $drone=$this->construirDrone();
        $this->assertEquals(10,$drone->cantidadDeBateria());
        $this->assertTrue($drone->mover(2,2));
        $this->assertEquals(6,$drone->cantidadDeBateria());
        $this->assertTrue($drone->mover(8,2));
        $this->assertEquals(0,$drone->cantidadDeBateria());
        $this->assertFalse($drone->mover(1,0));
    }

    public function testHistorial()
    {
        $drone=$this->construirDrone();
        $this->assertTrue($drone->mover(8,2));
        $this->assertEquals([['x'=>8,'y'=>2]],$drone->historial());
    }
=======

  public function testDrone() {
    $drone = new Drone(50);
    $this->assertTrue($drone->mover(5,5));
    $this->assertEquals(40, $drone->cantidadDeBateria());
    $this->assertEquals(array(array('x'=>5, 'y'=>5)), $drone->historial());

    $this->assertTrue($drone->mover(7,7));
    $this->assertEquals(36, $drone->cantidadDeBateria());
    $this->assertEquals(
      array(array('x'=>5, 'y'=>5), array('x'=>7, 'y'=>7)),
      $drone->historial()
    );

    $this->assertTrue($drone->mover(0,0));
    $this->assertEquals(50, $drone->cantidadDeBateria());
    
    $this->assertFalse($drone->mover(500,500));
  }

>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
}