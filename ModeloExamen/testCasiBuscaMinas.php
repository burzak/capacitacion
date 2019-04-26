<?php

require_once('./vendor/autoload.php');
require('./CasiBuscaMinas.php');

use PHPUnit\Framework\TestCase;

final class testCasiBuscaMinas extends TestCase
{

  public function testExisteCasiBuscaMinas() 
  {
    $this->assertTrue(class_exists("CasiBuscaMinas"));
  }
    
  
  public function testTieneLaPalabraQueYoDigo() 
  {
    $this->bm = new CasiBuscaMinas(5,5);
    $this->
    $this->assertEquals( $palabra , $ahorcado->damePalabra());
  }











  public function testTieneIntentos() 
  {
    $intentos = rand(0, 500);
    $ahorcado = new Ahorcado("aeou", $intentos);
    $this->assertEquals($intentos, $ahorcado->dameIntentos());
  }

  public function testEstaLaLetra() 
  {
    $ahorcado = new Ahorcado("chachara", 5);
    $esta = $ahorcado->pasarLetra('h');
    $this->assertEquals(True, $esta, "Esta la h");
  }

  public function testNoEstaLetra() 
  {
    $ahorcado = new Ahorcado("chachara", 5);
    $esta = $ahorcado->pasarLetra('e');
    $this->assertEquals(False, $esta, "No esta");
  }

  public function testRestaIntentos() 
  {
    $ahorcado = new Ahorcado("chachara", 5);
    $this->assertEquals(5,$ahorcado->dameIntentosRestantes());
    
    $ahorcado->pasarLetra('z');
    $this->assertEquals(4,$ahorcado->dameIntentosRestantes());
    $ahorcado->pasarLetra('h');
    $this->assertEquals(4,$ahorcado->dameIntentosRestantes());
  }

  public function testSiEsBoludoResta() 
  {
    $ahorcado = new Ahorcado("chachara", 5);
    $this->assertEquals(5,$ahorcado->dameIntentosRestantes());
    
    $ahorcado->pasarLetra('h');
    $this->assertEquals(5,$ahorcado->dameIntentosRestantes());
    $ahorcado->pasarLetra('h');
    $this->assertEquals(4,$ahorcado->dameIntentosRestantes());
  }

  public function testMostrarTodoOculto() 
  {
    $ahorcado = new Ahorcado("cha", 5);
    $this->assertEquals('---',$ahorcado->mostrar());
  }

  public function testMostrarCasiTodoOculto() 
  {
    $ahorcado = new Ahorcado("cha", 5);
    $ahorcado->pasarLetra("h");
    $this->assertEquals('-h-',$ahorcado->mostrar());
    $this->assertFalse($ahorcado->gano());
    $ahorcado->pasarLetra("a");
    $this->assertEquals('-ha',$ahorcado->mostrar());
    $this->assertFalse($ahorcado->gano());
    $ahorcado->pasarLetra("c");
    $this->assertEquals('cha', $ahorcado->mostrar() );
    $this->assertTrue($ahorcado->gano());
  }


  public function testGano()
  {
    $ahorcado = new Ahorcado("ab", 5);
    $ahorcado->pasarLetra("a");
    $this->assertFalse($ahorcado->perdio());
    $this->assertFalse($ahorcado->gano());
    $ahorcado->pasarLetra("b");
    $this->assertFalse($ahorcado->perdio());
    $this->assertTrue($ahorcado->gano());
  }

  public function testPerdio() 
  {
    $ahorcado = new Ahorcado("a", 1);
    $ahorcado->pasarLetra("z");
    $this->assertTrue($ahorcado->perdio());
    $this->assertFalse($ahorcado->gano());
    $this->assertEquals(0, $ahorcado->dameIntentosRestantes());
  }
}