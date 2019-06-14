<?php

require_once('./vendor/autoload.php');
require_once('Ahorcado.php');
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$palabras=array(
  'campeones',
  'vivaglobalhitts',
  'carlosslim',
  'california',
  'comoasado',
);

$a = new Ahorcado($palabras[array_rand($palabras)], 5);

$connection = new AMQPStreamConnection('localhost', 10001, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('Ahorcado', false, false, false, false);

echo "Palabra:\n".$a->mostrar();
echo "\n\n";
echo "Intentos: ".$a->dameIntentosRestantes();

$letras = array();

$callback = function ($msg) {
    global $a;
    global $letras;
    global $palabras;

    if (strlen($msg->body)!=1){
      return;
    }

    if ($a->termino()) {
      return;
    }
    $letras[] = $msg->body;

    echo "\n\n\n\n\n\n\n\n\n\n";
    $a->pasarLetra($msg->body);
    echo "Palabra:\n".$a->mostrar();
    echo "\n\n";
    echo "Letras: ".implode(",", $letras)."\n";
    echo "Intentos: ".$a->dameIntentosRestantes()."\n";
    if ($a->perdio() || $a->gano()) {

      if ($a->perdio()) {
        echo "=============\n";
        echo "Feo y burro!\n";
        echo "=============\n";
      } else {
        echo "=============\n";
        echo "Ganamos!";
        echo "=============\n";
      }

      echo "\n\n\nOtro\n";
      $a = new Ahorcado($palabras[array_rand($palabras)], 5);
      $letras = array();
      echo "Palabra:\n".$a->mostrar();
      echo "\n\n";
      echo "Intentos: ".$a->dameIntentosRestantes();

    }
};

$channel->basic_consume('Ahorcado', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
