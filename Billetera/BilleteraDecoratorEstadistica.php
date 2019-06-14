<?php

include './Billetera.php';

class BilleteraDecoratorEstadistica implements Billetera {

  public function __construct(Billetera $b)
  {
    $this->billetera = $b;
  }


}