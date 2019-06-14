<?php
require_once('./vendor/autoload.php');
require_once('Ahorcado.php');
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 10001, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('mensajes', false, false, false, false);

$msg = new AMQPMessage("Hola, este mensaje es el que voy a enviar a todos los que estan chateando");
$channel->basic_publish($msg, '', 'mensajes');

echo "termino\n";
