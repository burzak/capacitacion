<?php

class JugarController implements Controllers {
    public function get(){
        $_SESSION['letras'][]= $_GET['letras'];

        $ahorcado = new Ahorcado($_SESSION['palabra'], 5);
        if(!$ahorcado->perdio()){
        foreach($_SESSION['letras'] as $letras){
            $ahorcado->pasarLetra($letra);
        }
    }
        echo '<pre>';
        echo $ahorcado->mostrar() . "\n";
        echo 'Intentos Restantes: '. $ahorcado->dameIntentosRestantes();
        if($ahorcado->gano()){
            echo 'Gano!!';
        }
        if($ahorcado->perdio()){
            echo 'Perdio!!';
        }
        echo '</pre>';
    }

    public function post(){

    }
}