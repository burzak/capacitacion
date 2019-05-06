<?php
$peliculas = array(
    
    array('nombre'=>'matrix', 'tiempo'=>120),
    array('nombre'=>'matrix2', 'tiempo'=>320),
    array('nombre'=>'matrix3', 'tiempo'=>140),
    array('nombre'=>'tenes un email', 'tiempo'=>20),
    array('nombre'=>'tomy regresa', 'tiempo'=>10),
);
$t=0;
$maslarga=[];
foreach ($peliculas as $k => $p){
    if($p['tiempo']>$t){
        $t=$p['tiempo'];
        $maslarga=$p;
    }
}

return $maslarga;

