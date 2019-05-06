<?php
<<<<<<< HEAD

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
>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
include './vendor/autoload.php';
include 'Drone.php';

use PHPUnit\Framework\TestCase;

<<<<<<< HEAD

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


    

=======
final class DroneTest extends TestCase
{

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
>>>>>>> a7db76f98933cd932b634681da1f4ba236d9b559
  }

}