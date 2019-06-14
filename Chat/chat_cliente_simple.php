<?php

require_once('./vendor/autoload.php');
require_once('Ahorcado.php');
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 10001, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('chat1', false, false, false, false);

$callback = function ($msg) {
  global $channel;
  var_dump($msg);
  echo ' [x] ', $msg->body, "\n";
};

$channel->basic_consume('chat1', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}