<?php

include 'Base.php';

class Pedido extends Base {

  protected $table = 'pedido';

  public function getPedidos() {
    $pedidos = $this->select();
    return $pedidos;
  }
}

$model = new Pedido();

print_r($model->getPedidos());