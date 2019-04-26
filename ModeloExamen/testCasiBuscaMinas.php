<?php

require_once('./vendor/autoload.php');
require_once('./CasiBuscaMinas.php');

use PHPUnit\Framework\TestCase;

final class testCasiBuscaMinas extends TestCase
{

  public function testExisteCasiBuscaMinas() 
  {
    $this->assertTrue(class_exists("BuscaMinas"));
  }

  
  public function testAgregarMinasCorrectamente() 
  {
    $this->bm = new BuscaMinas(5,5);
    $this->bm->agregarMina(0,0);
    $this->bm->agregarMina(2,1);
    $this->bm->agregarMina(4,3);
    $this->bm->agregarMina(0,4);
    $this->bm->agregarMina(2,4);

    $this->assertEquals(array (-9999,2,1,1,0)    ,$this->bm->minas[0],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (1,2,-9999,1,0)    ,$this->bm->minas[1],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (0,1,  1,  2,1)    ,$this->bm->minas[2],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (1,2,1,2,-9999)    ,$this->bm->minas[3],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (-9999,2,-9999,2,1),$this->bm->minas[4],'FALLO AL MARCAR VALORES EN TABLA');
    
    //AGREGAR COMENTARIO :   
  }

  public function testSacarMinasCorrectamente() 
  {
    $this->bm = new BuscaMinas(5,5);
    $this->bm->agregarMina(0,0);
    $this->bm->agregarMina(2,1);
    $this->bm->agregarMina(4,3);
    $this->bm->agregarMina(0,4);
    $this->bm->agregarMina(2,4);

    $this->bm->sacarMina(2,1);
    $this->bm->sacarMina(4,3);
    $this->bm->sacarMina(0,4);
    $this->bm->sacarMina(2,4);

    $this->assertEquals(array (-9999,1,0,0,0),$this->bm->minas[0],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (1,1,0,0,0)    ,$this->bm->minas[1],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (0,0,0,0,0)    ,$this->bm->minas[2],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (0,0,0,0,0)    ,$this->bm->minas[3],'FALLO AL MARCAR VALORES EN TABLA');
    $this->assertEquals(array (0,0,0,0,0)    ,$this->bm->minas[4],'FALLO AL MARCAR VALORES EN TABLA');
    
  }
  public function testPerdio()
  {
    $this->bm = new BuscaMinas(5,5);
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
    $this->bm = new BuscaMinas(5,5);
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
