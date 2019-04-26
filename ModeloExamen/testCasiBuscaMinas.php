<?php

require_once('./vendor/autoload.php');
require_once('./CasiBuscaMinas.php');

use PHPUnit\Framework\TestCase;

final class testCasiBuscaMinas extends TestCase
{
  protected function setUp() : void
  {
    $this->bm = new BuscaMinas(5,5);
    
  }

  public function testExisteCasiBuscaMinas() 
  {
    $this->assertTrue(class_exists("BuscaMinas"));
  }

  public function testAgregarFueraDelTablero() 
  {
    $this->assertFalse($this->bm->agregarMina(10,10));
  }

  public function testAgregarMinaEnMina()
  {
    $this->bm->agregarMina(0,0);
    $this->assertFalse($this->bm->agregarMina(0,0));

  }


  
  public function testAgregarMinasCorrectamente() 
  {
    
    $this->assertTrue($this->bm->agregarMina(0,0));
    $this->assertTrue($this->bm->agregarMina(2,1));
    $this->assertTrue($this->bm->agregarMina(4,3));
    $this->assertTrue($this->bm->agregarMina(0,4));
    $this->assertTrue($this->bm->agregarMina(2,4));


    $this->assertEquals(2,$this->bm->jugar(1,0));
    $this->assertEquals(1,$this->bm->jugar(2,0));
    $this->assertEquals(1,$this->bm->jugar(3,0));
    $this->assertEquals(0,$this->bm->jugar(4,0));

    $this->assertEquals(1,$this->bm->jugar(0,1));
    $this->assertEquals(2,$this->bm->jugar(1,1));
    $this->assertEquals(1,$this->bm->jugar(3,1));
    $this->assertEquals(0,$this->bm->jugar(4,1));
   
    $this->assertEquals(0,$this->bm->jugar(0,2));
    $this->assertEquals(1,$this->bm->jugar(1,2));
    $this->assertEquals(1,$this->bm->jugar(2,2));
    $this->assertEquals(2,$this->bm->jugar(3,2));
    $this->assertEquals(1,$this->bm->jugar(4,2));

    $this->assertEquals(1,$this->bm->jugar(0,3));
    $this->assertEquals(2,$this->bm->jugar(1,3));
    $this->assertEquals(1,$this->bm->jugar(2,3));
    $this->assertEquals(2,$this->bm->jugar(3,3));

    $this->assertEquals(2,$this->bm->jugar(1,4));
    $this->assertEquals(2,$this->bm->jugar(3,4));
    $this->assertEquals(1,$this->bm->jugar(4,4));
    
    
  }

  public function testSacarMinasCorrectamente() 
  {
    
    $this->bm->agregarMina(0,0);
    $this->bm->agregarMina(2,1);
    $this->bm->agregarMina(4,3);
    $this->bm->agregarMina(0,4);
    $this->bm->agregarMina(2,4);

    $this->assertTrue($this->bm->sacarMina(2,1));
    $this->assertTrue($this->bm->sacarMina(4,3));
    $this->assertTrue($this->bm->sacarMina(0,4));
    $this->assertTrue($this->bm->sacarMina(2,4));

    $this->assertEquals(0,$this->bm->jugar(2,1));
    $this->assertEquals(0,$this->bm->jugar(4,3));
    $this->assertEquals(0,$this->bm->jugar(0,4));
    $this->assertEquals(0,$this->bm->jugar(2,4));
    
  }

  public function testSacarMinaNoEsta() 
  {
    $this->assertFalse($this->bm->sacarMina(4,4));
  }

  public function testSacarDosVeces()
  {
    $this->bm->agregarMina(0,0);
    $this->bm->sacarMina(0,0);
    $this->assertFalse($this->bm->sacarMina(0,0));

  }

  public function testPerdio()
  {
    
    $this->bm->agregarMina(0,0);
    $this->bm->agregarMina(2,1);
    $this->bm->agregarMina(4,3);
    $this->bm->agregarMina(0,4);
    $this->bm->agregarMina(2,4);

    $this->assertFalse($this->bm->jugar(4,3));
    $this->assertTrue($this->bm->terminoDeJugar());

  }

  public function testGano()
  {
    
    $this->bm->agregarMina(0,0);
    $this->bm->agregarMina(2,1);
    $this->bm->agregarMina(4,3);
    $this->bm->agregarMina(0,4);
    $this->bm->agregarMina(2,4);

    $this->bm->sacarMina(0,0);
    $this->bm->sacarMina(2,1);
    $this->bm->sacarMina(4,3);
    $this->bm->sacarMina(0,4);
    $this->bm->sacarMina(2,4);

    $this->assertTrue($this->bm->gano());
    $this->assertTrue($this->bm->terminoDeJugar());



  }

}
