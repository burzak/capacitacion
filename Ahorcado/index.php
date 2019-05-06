<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != 'GET'){
    die;
}
include_once('Routes.php');
include_once('Ahorcado.php');
include_once('AhorcadoController.php');

$router = new Router;

$router->agregarController('empezar', new EmpezarAhorcadoController);
$router->agregarController('jugar', new JugarController());

$c= $router->dispatch($_GET['patch']);

$c->get();