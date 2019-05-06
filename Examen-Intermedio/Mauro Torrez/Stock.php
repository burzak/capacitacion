<?php

class Stock 
{
  private $capacidadMaxima;
  private $capacidad;
  private $stock;

  public function __construct($capacidadMaxima) 
  {
    $this->capacidadMaxima = $capacidadMaxima;
    $this->capacidad = $capacidadMaxima;
    $this->stock = array();
  }

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) 
  {
      if(!$this->lleno())
      {
        
          if(array_key_exists($producto,$this->stock))
          {
            
              $this->stock [$producto] += $cantidad;  
              $this->capacidad = $this->capacidad - $cantidad;               
              return true;
          }        
          else
          {
              $this->stock [$producto] = $cantidad;
              $this->capacidad = $this->capacidad - $cantidad;
              return true;
          }
          
      }

      else
      {
          return false;
      }
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) 
  {
    
      if(!$this->vacio())
      {
        
          if(array_key_exists($producto,$this->stock))
          {
           
              $this->stock [$producto] -= $cantidad;   
              $this->capacidad = $this->capacidad + $cantidad;
              return true;
          }
          else
          {
              return false;
          }
      }
      else
      {
          return false;
      }
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto)
  {
    if(array_key_exists($producto, $this->stock))
    {
      return  $this->stock[$producto];
    }
    return false;
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() 
  {
    if($this->capacidad == $this->capacidadMaxima)
    {
      return true;
    }
    else
    {
      return false;
    }
    
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() 
  {
    if($this->capacidad == 0)
    {
      return true;
    }
    return false;
  }
}


