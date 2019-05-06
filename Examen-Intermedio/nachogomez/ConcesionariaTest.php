<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{   
    public function testAgregarAutos(){
        $_autos= new Concesionaria();
        $_autos->agregarAutos(1,'Fiat','Siena',2015,200000);
        $this->assertTrue(!empty($_autos));
    }
    public function testNoSeAgregoAutos(){
        $_autos=new Concesionaria();
        $this->assertFalse(empty($_autos));
    }
    public function testMostrarAutosDeMarca(){
        $_autos=new Concesionaria();
        $_autos->agregarAutos(1,'Ford','Munstang',2015,200000);
        $_autos->agregarAutos(2,'Renault','Kangoo',2014,300000);
        $_autos->mostrarAutosDeMarca('Ford');
        $this->assertTrue($_autos->mostrarAutosDeMarca('Ford'));
        $this->assertFalse($_autos->mostrarAutosDeMarca('Renault'));
    }
    public function testSeVendioAuto(){
        $_autos=new Concesionaria();
        $_autos->agregarAutos(1,'Ford','Munstang',2015,200000);
        $_autos->agregarAutos(2,'Renault','Kangoo',2014,300000);
        $_autos->venderAutoMarca('Renault');
        $this->assertTrue($_autos->venderAutoMarca('Renault'));
        $this->assertFalse($_autos->venderAutoMarca('Ford'));
    }
    public function testSiGano(){
        $_autos=new Concesionaria();
        $_autos->agregarAutos(1,'Ford','Munstang',2015,200000);
        $_autos->agregarAutos(2,'Renault','Kangoo',2014,300000);
        $_autos->venderAutoMarca('Renault');
        $this->assertEquals(300000,$_autos->venderAutoMarca('Renault'));
    }
    public function testNoGanoNada(){
        $_autos=new Concesionaria();
        $_autos->agregarAutos(1,'Ford','Munstang',2015,200000);
        $_autos->agregarAutos(2,'Renault','Kangoo',2014,300000);
        $this->assertEquals(0,$_autos->venderAutoMarca('Renault'));
    }
}