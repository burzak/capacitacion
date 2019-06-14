<?php
/**
 * este server, recibe cada mensaje y lo reenvia a todos los canales llamados
 * chat1, chat2, chat3, ..., chat14, y cada persona que desea chatear debe
 * leer el queue que le corresponde.
 */

require_once('./vendor/autoload.php');
require_once('Ahorcado.php');
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 10001, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('mensajes', false, false, false, false);

$callback = function ($msg) {
    global $channel;
    echo "- ". $msg->body."\n";
    for($i=1; $i<15; $i++) {

      $channel->queue_declare('chat'.$i, false, false, false, false);
      
      $msg = new AMQPMessage($msg->body);
      $channel->basic_publish($msg, '', 'chat'.$i);
    }
};

$channel->basic_consume('mensajes', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
