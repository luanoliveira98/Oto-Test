<?php

namespace App\Services;

use App\Models\Pedido;

/**
* Sumarizações de dados transacionais de pedidos.
*/

class Pmweb_Orders_Stats {

  protected $model;
  protected $startDate;
  protected $endDate;

  public function __construct() {
    $this->model = new Pedido();
  }

  /**
  * Define o período inicial da consulta.
  * @param String $date Data de início, formato `Y-m-d` (ex, 2017-08-24).
  *
  * @return void
  */
  public function setStartDate($date): void
  {
    $this->model->setStartDate($date);
  }

  /**
  * Define o período final da consulta.
  *
  * @param String $date Data final da consulta, formato `Y-m-d` (ex, 2017-08-24).
  *
  * @return void
  */
  public function setEndDate($date): void
  {
    $this->model->setEndDate($date);
  }

  /**
  * Retorna o total de pedidos efetuados no período.
  *
  * @return int Total de pedidos.
  */
  public function getOrdersCount(): int
  {
    $orders = $this->model->getPedidos();
    $count = count($orders);
    return $count;
  }

  /**
  * Retorna a receita total de pedidos efetuados no período.
  *
  * @return float Receita total no período.
  */
  public function getOrdersRevenue(): float
  {
    $orders = $this->model->getPedidos(['ROUND(SUM(price), 2) revenue']);
    $revenue = $orders[0]->revenue;
    return $revenue;
  }

  /**
  * Retorna o total de produtos vendidos no período (soma de quantidades).
  *
  * @return int Total de produtos vendidos.
  */
  public function getOrdersQuantity(): int
  {
    $orders = $this->model->getPedidos(['SUM(quantity) quantity']);
    $quantity = $orders[0]->quantity;
    return $quantity;
  }

  /**
  * Retorna o preço médio de vendas (receita / quantidade de produtos).
  *
  * @return float Preço médio de venda.
  */
  public function getOrdersRetailPrice(): float
  {
    $orders = $this->model->getPedidos(['ROUND(SUM(price) / SUM(quantity), 2) averageRetailPrice']);
    $averageRetailPrice = $orders[0]->averageRetailPrice;
    return $averageRetailPrice;
  }

  /**
  * Retorna o ticket médio de venda (receita / total de pedidos).
  *
  * @return float Ticket médio.
  */
  public function getOrdersAverageOrderValue(): float
  {
    $orders = $this->model->getPedidos(['ROUND(AVG(price), 2) averageOrderValue']);
    $averageOrderValue = $orders[0]->averageOrderValue;
    return $averageOrderValue;
  }
  
  /**
  * Retorna uma listagem com a quantidade de pedidos por dia.
  *
  * @return array Pedidos por dia.
  */
  public function getOrdersByDate() {
    $date = (object) [];

    $orders = $this->model->getPedidos();

    foreach ($orders as $order) {
      $orderDate = DateWithoutTime($order->order_date);

      if(isset($date->{$orderDate})) {
        $date->{$orderDate} ++;
      } else {
        $date->{$orderDate} = 0;
      }
    }
    return responseJson($date);
  }
}