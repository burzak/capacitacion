<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  die;
}

include_once('Router.php');
include_once('../Ahorcado/Ahorcado.php');
include_once('EmpezarAhorcadoController.php');
include_once('JugarController.php');

$router = new Router();

$router->agregarController('empezar', new EmpezarAhorcadoController());
$router->agregarController('jugar', new JugarController());


$c = $router->dispatch($_GET['path']);

$c->get();