<?php

require_once "ConcesionariaInterface.php";
require_once "Concesionaria.php";

class ConcesionariaVentasMarca implements ConcesionariaInterface
{
    private $concesionaria;
    private $ventas_marcas;

    public function __construct(ConcesionariaInterface $concesionaria_original)
    {
        $this->concesionaria = $concesionaria_original; 
        $this->ventas_marcas = array();      
    }

    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio)
    {
        return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }
    public function mostrarAutosDeMarca($marca)
    {
        return $this->concesionaria->mostrarAutosDeMarca($marca);   
    }
    public function venderAutoMarca($marca)
    {
        $totalAnterior = $this->totalGanado();        

        $venta = $this->concesionaria->venderAutoMarca($marca);
        
        $totalUltimo = $this->totalGanado();
        $valorVenta =  $totalUltimo - $totalAnterior ;

        if(!array_key_exists($marca, $this->ventas_marcas))
        {
            $this->ventas_marcas [$marca] = $valorVenta;
        }
        else
        {
            $this->ventas_marcas [$marca] += $valorVenta;
        }
        return $venta;
    }
    public function totalGanado()
    {
        return $this->concesionaria->totalGanado();
    }

    public function totalGanadoConMarca($marca)
    {
        return $this->ventas_marcas[$marca];
    }
}