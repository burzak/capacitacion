<?php

require_once('./vendor/autoload.php');

include 'Drone.php';

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
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
}