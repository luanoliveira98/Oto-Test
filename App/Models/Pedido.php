<?php

namespace App\Models;

/**
* Modelo de pedidos para os demais, com funções genéricas.
*/

class Pedido extends Base {

  protected $table = 'pedido';
  protected $startDate;
  protected $endDate;

  /**
  * Define a data inicial para buscas.
  * @param string $startDate Data inicial para busca.
  * 
  * @return void
  */

  public function setStartDate(string $startDate): void
  {
    $this->startDate = $startDate;
  }

  /**
  * Define a data final para buscas.
  * @param string $endDate Data final para busca.
  * 
  * @return void
  */
  public function setEndDate(string $endDate): void
  {
    $this->endDate = $endDate;
  }

  /**
  * Adiciona as datas pré-definidas a busca, caso seja necessário.
  * 
  * @return void
  */
  public function setDatesIntoQuery(): void
  {
    if($this->startDate) $this->query->where('order_date', $this->startDate, '>=');
    if($this->endDate) $this->query->where('order_date', $this->endDate, '<=');
  }

  /**
  * Busca todos os pedidos cadastrados.
  * @param array $fields Campos para busca (ex, ['order_id', 'order_date', 'price']). Também é possível enviar campos de busca 
  * personalizados (ex, ['SUM(quantity)', 'AVG(price)']), assim como adicionar alias aos campos (ex, ['SUM(price) amount'])
  * 
  * @return array
  */
  public function getPedidos(array $fields = ['*']): array
  {
    $this->query = $this->select($fields);
    $this->setDatesIntoQuery();
    $this->query = $this->orderBy('order_date');
    $orders = $this->query->get();
    return $orders;
  }
}