<?php

include_once('AhorcadoController.php');

class EmpezarAhorcadoController implements Controllers
{
    public function get(){
        $_SESSION['palabra']= $_GET['palabra'];
        $_SESSION['letras']= array();
        $ahorcado = new Ahorcado($_GET['palabra'], 5);
        
        echo $ahorcado->mostrar();
    }

    public function post(){

    }
}