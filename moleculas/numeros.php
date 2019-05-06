
<?php
 
 class ListadoAnimales {
     private $array=array();
   public function agregarAnimal($animal, $cantidad) 
   {
        if(array_key_exists($animal, $this->array))
        {
            $this->array[$animal]+=$cantidad;
        }
        else {
          $this->array[$animal]= $cantidad;

        }
    }
   public function mostrarTotal() 
   {
    return $this->array;
   }
 }
  
 srand(1000);
 $animales = array('leon', 'mono', 'gorila', 'raton', 'chancho', 'vaca');
  
 $listado = new ListadoAnimales();
  
 $listado->agregarAnimal("raton",10);
 $listado->agregarAnimal("vaca",8);
 $listado->agregarAnimal("gorila",2);
 $listado->agregarAnimal("vaca",16);
 $listado->agregarAnimal("chancho",11);
 $listado->agregarAnimal("chancho",20);
 $listado->agregarAnimal("mono",20);
 $listado->agregarAnimal("raton",17);
 $listado->agregarAnimal("vaca",4);
 $listado->agregarAnimal("raton",1);
 $listado->agregarAnimal("vaca",6);
 $listado->agregarAnimal("chancho",11);
 $listado->agregarAnimal("vaca",15);
 $listado->agregarAnimal("gorila",3);
 $listado->agregarAnimal("chancho",12);
 $listado->agregarAnimal("gorila",12);
 $listado->agregarAnimal("vaca",6);
 $listado->agregarAnimal("vaca",16);
 $listado->agregarAnimal("raton",8);
 $listado->agregarAnimal("vaca",6);
 $listado->agregarAnimal("gorila",8);
 $listado->agregarAnimal("leon",13);
 $listado->agregarAnimal("raton",2);
 $listado->agregarAnimal("chancho",10);
 $listado->agregarAnimal("mono",1);
 $listado->agregarAnimal("gorila",7);
 $listado->agregarAnimal("gorila",5);
 $listado->agregarAnimal("chancho",13);
 $listado->agregarAnimal("raton",19);
 $listado->agregarAnimal("chancho",11);
 
 print_r($listado->mostrarTotal());