<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function testClaseExiste()
    {
        $this->assertTrue(class_exists('Concesionaria'));
    }

     /**
   * Se agregan autos con idReferencia, si el id ya existe no lo agrega
   */
    public function testAgregarAuto()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1010, 'ford', 100 , 1994, 20000));
    }

    public function testAgregarMuchosAuto()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1010, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(1011, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(1012, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(1013, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(1014, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(1015, 'ford', 100 , 1994, 20000));
    }

    public function testAgregarAutoConIDExistente()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1010, 'ford', 100 , 1994, 20000);
        $this->assertFalse($concesionaria->agregarAutos(1010, 'ford', 100 , 1994, 20000));
    }

    public function testAgregarMuchosAutosConIDExistente()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1113, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1114, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1115, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1116, 'ford', 100 , 1994, 20000);
        $this->assertFalse($concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000));
        $this->assertFalse($concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 20000));
        $this->assertFalse($concesionaria->agregarAutos(1113, 'ford', 100 , 1994, 20000));
        $this->assertFalse($concesionaria->agregarAutos(1114, 'ford', 100 , 1994, 20000));
        $this->assertFalse($concesionaria->agregarAutos(1115, 'ford', 100 , 1994, 20000));
        $this->assertFalse($concesionaria->agregarAutos(1116, 'ford', 100 , 1994, 20000));
    }

      /**
   * Muestra todos los autos de cierta marca
   */
    public function testMostrarMarcasDeAutosAgregados()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 20000);
       


        $this->assertEquals(  [['id' => 1111,
                                'marca' => 'ford',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 20000],

                                ['id' =>1112,
                                'marca' => 'ford',
                                'modelo' =>  100 , 
                                'anio' => 1994, 
                                'precio' => 20000]] 

                                ,$concesionaria->mostrarAutosDeMarca('ford')); 
    }

    public function testMostrarMarcasDeAutosAgregadosCompleto()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 20000);

        $concesionaria->agregarAutos(1000, 'bmw', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1001, 'bmw', 100 , 1994, 20000);

        $concesionaria->agregarAutos(2000, 'audi', 100 , 1994, 20000);
        $concesionaria->agregarAutos(2001, 'audi', 100 , 1994, 20000);
       


        $this->assertEquals(  [['id' => 1111,
                                'marca' => 'ford',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 20000],

                                ['id' =>1112,
                                'marca' => 'ford',
                                'modelo' =>  100 , 
                                'anio' => 1994, 
                                'precio' => 20000]] 

                                ,$concesionaria->mostrarAutosDeMarca('ford')); 
                               
        
        $this->assertEquals(  [['id' => 1000,
                                'marca' => 'bmw',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 20000],

                                ['id' =>1001,
                                'marca' => 'bmw',
                                'modelo' =>  100 , 
                                'anio' => 1994, 
                                'precio' => 20000]] 

                                ,$concesionaria->mostrarAutosDeMarca('bmw')); 

        $this->assertEquals(  [['id' => 2000,
                                'marca' => 'audi',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 20000],

                                ['id' =>2001,
                                'marca' => 'audi',
                                'modelo' =>  100 , 
                                'anio' => 1994, 
                                'precio' => 20000]] 

                                ,$concesionaria->mostrarAutosDeMarca('audi')); 
    }

    public function testNoMostrarMarcasDeAutosNoExistente()
    {
        $concesionaria = new Concesionaria();
        $this->assertFalse($concesionaria->mostrarAutosDeMarca('volvo'), 
        'DEBERIA DEVOLVER FALSE SI SE BUSCA UNA MARCA NO EXISTENTE EN LA CONCESIONARIA');
    }


    /**
   * Al vender el auto de una marca, se elige el auto más caro de dicha
   * marca y lo vende.
   * 
   * Lo que devuelve es el precio de venta o 0 si no quedan autos de dicha marca
   */
    public function testVenderAuto()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 30000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(30000,$concesionaria->totalGanado());

    }

    public function testVenderMuchosAutos()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 55000);
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(55000,$concesionaria->totalGanado());

        $concesionaria->agregarAutos(1100, 'audi', 100 , 1994, 310000);
        $concesionaria->agregarAutos(1101, 'audi', 100 , 1994, 120000);
        $concesionaria->agregarAutos(1102, 'audi', 100 , 1994, 500000);
        $concesionaria->venderAutoMarca('audi');
        $this->assertEquals(555000,$concesionaria->totalGanado());
        

        $concesionaria->agregarAutos(1150, 'bmw', 100 , 1994, 310000);
        $concesionaria->agregarAutos(1151, 'bmw', 100 , 1994, 120000);
        $concesionaria->agregarAutos(1152, 'bmw', 100 , 1994, 500000);
        $concesionaria->venderAutoMarca('bmw');
        $this->assertEquals(1055000,$concesionaria->totalGanado());
    }

    public function testVenderAutoHabiendoPreciosIguales()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 30000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 30000);
        $concesionaria->agregarAutos(1113, 'ford', 100 , 1994, 30000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(30000,$concesionaria->totalGanado());
    }

    public function testVenderAutoMarcaSinStock()
    {
        $concesionaria = new Concesionaria();       
        $this->assertFalse($concesionaria->venderAutoMarca('ford'));
        $this->assertFalse($concesionaria->venderAutoMarca('bmw'));
        $this->assertFalse($concesionaria->venderAutoMarca('audi'));
        $this->assertEquals(0,$concesionaria->totalGanado());
    }

    public function testVenderAutoMarcaSinStock2()
    {
        $concesionaria = new Concesionaria();   
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 30000);    
        $concesionaria->venderAutoMarca('ford');
        $this->assertFalse($concesionaria->venderAutoMarca('ford'));
        $this->assertEquals(30000,$concesionaria->totalGanado());

        $concesionaria->agregarAutos(1113, 'audi', 100 , 1994, 30000);    
        $concesionaria->venderAutoMarca('audi');
        $this->assertFalse($concesionaria->venderAutoMarca('audi'));
        $this->assertEquals(60000,$concesionaria->totalGanado());

        $concesionaria->agregarAutos(1115, 'bmw', 100 , 1994, 30000);    
        $concesionaria->venderAutoMarca('bmw');
        $this->assertFalse($concesionaria->venderAutoMarca('bmw'));
        $this->assertEquals(90000,$concesionaria->totalGanado());
    }


    public function testTotalGanado()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(1111, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1112, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1113, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1114, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1115, 'ford', 100 , 1994, 20000);
        $concesionaria->agregarAutos(1116, 'ford', 100 , 1994, 20000);


        $concesionaria->venderAutoMarca('ford');
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->venderAutoMarca('ford');

        $this->assertEquals(120000, $concesionaria->totalGanado());
    }


    public function testProcesoCompleto()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1000, 'ford', 100 , 1994, 20000));
        $this->assertTrue($concesionaria->agregarAutos(2000, 'audi', 100 , 1994, 100000));
        $this->assertFalse($concesionaria->agregarAutos(2000, 'audi', 100 , 1994, 100000));

        $this->assertEquals(  [['id' => 1000,
                                'marca' => 'ford',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 20000]
                                ] 

                                ,$concesionaria->mostrarAutosDeMarca('ford')); 
        
        $this->assertEquals(  [['id' => 2000,
                                'marca' => 'audi',
                                'modelo' => 100 ,
                                'anio' => 1994,
                                'precio' => 100000]
                                ] 

                                ,$concesionaria->mostrarAutosDeMarca('audi')); 


        $this->assertTrue($concesionaria->venderAutoMarca('ford'));
        $this->assertEquals(20000, $concesionaria->totalGanado());
        $this->assertFalse($concesionaria->venderAutoMarca('ford'));

        $this->assertTrue($concesionaria->venderAutoMarca('audi'));
        $this->assertEquals(120000, $concesionaria->totalGanado());
        $this->assertTrue($concesionaria->agregarAutos(2000, 'audi', 100 , 1994, 100000));

    } 
     


  
}

