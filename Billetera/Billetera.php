<?php

interface Billetera {
  function agregar($billete, $cantidad);
  function sacar($billete, $cantidad);
  function mostrar();
}