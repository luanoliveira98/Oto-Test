<?php

/**
* Sumarizações de dados transacionais de pedidos.
*/

include 'Controller.php';
include __DIR__.'/../Models/Pedido.php';

include __DIR__ . '/../Helpers/Dates.php';

class Pmweb_Orders_Stats extends Controller {

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
    $pedidos = $this->model->getPedidosUsandoDatas();
    $quantidadePedidos = count($pedidos);
    return $quantidadePedidos;
  }
  /**
  * Retorna a receita total de pedidos efetuados no período.
  *
  * @return float Receita total no período.
  */
  public function getOrdersRevenue(): float
  {
    $pedidos = $this->model->getPedidosUsandoDatas(['ROUND(SUM(price), 2) amount']);
    $amount = $pedidos[0]->amount;
    return $amount;
  }
  /**
  * Retorna o total de produtos vendidos no período (soma de quantidades).
  *
  * @return int Total de produtos vendidos.
  */
  public function getOrdersQuantity(): int
  {
    $pedidos = $this->model->getPedidosUsandoDatas(['SUM(quantity) products']);
    $products = $pedidos[0]->products;
    return $products;
  }
  /**
  * Retorna o preço médio de vendas (receita / quantidade de produtos).
  *
  * @return float Preço médio de venda.
  */
  public function getOrdersRetailPrice() {
    $pedidos = $this->model->getPedidosUsandoDatas(['ROUND(SUM(price) / SUM(quantity), 2) averagePrice']);
    $averagePrice = $pedidos[0]->averagePrice;
    return $averagePrice;
  }
  /**
  * Retorna o ticket médio de venda (receita / total de pedidos).
  *
  * @return float Ticket médio.
  */
  public function getOrdersAverageOrderValue() {
    $pedidos = $this->model->getPedidosUsandoDatas(['ROUND(AVG(price), 2) averageTicket']);
    $averageTicket = $pedidos[0]->averageTicket;
    return $averageTicket;
  }
  
  /**
  * Retorna uma listagem com a quantidade de pedidos por dia.
  *
  * @return array Pedidos por dia.
  */
  public function getOrdersByDate() {
    $date = (object) [];

    $pedidos = $this->model->getPedidos();
    foreach ($pedidos as $pedido) {
      $orderDate = DateWithoutTime($pedido->order_date);

      echo $orderDate;
      break;

      if(isset($date->{$ordeDate})) {
        $date->{$ordeDate} ++;
      } else {
        $date->{$ordeDate} = 0;
      }
    }
    return $this->responseJson($date);
  }
}

$test = new Pmweb_Orders_Stats();

// $test->setStartDate('2021-01-01');
// $test->setEndDate('2021-12-31');
// echo "Qtd: {$test->getOrdersCount()} ";
// echo "R$: {$test->getOrdersRevenue()} ";
// echo "Prod: {$test->getOrdersQuantity()} ";
// echo "R$ Médio: {$test->getOrdersRetailPrice()} ";
// echo "Ticket Médio: {$test->getOrdersAverageOrderValue()} ";
print_r($test->getOrdersByDate());