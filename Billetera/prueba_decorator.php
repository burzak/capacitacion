<?php

include './Billetera.php';
include './BilleteraEnPesos.php';
include './programa_secreto.php';

$miBilletera = new Billetera();

// $miBilletera = ... DECORAR LA BILLETERA ...

$miBilletera = programa_secreto($miBilletera);

// $miBilletera->mostrarEstadistica();