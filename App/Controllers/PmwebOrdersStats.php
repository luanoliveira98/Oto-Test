<?php
/**
* Sumarizações de dados transacionais de pedidos.
*/

include __DIR__.'/../Models/Pedido.php';

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
    $pedidos = $this->model->getPedidosUsandoDatas(['SUM(price) amount']);
    $amount = round($pedidos[0]['amount'], 2);
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
    $products = $pedidos[0]['products'];
    return $products;
  }
  /**
  * Retorna o preço médio de vendas (receita / quantidade de produtos).
  *
  * @return float Preço médio de venda.
  */
  public function getOrdersRetailPrice() {
    $pedidos = $this->model->getPedidosUsandoDatas(['(SUM(price) / SUM(quantity)) averagePrice']);
    $averagePrice = round($pedidos[0]['averagePrice'], 2);
    return $averagePrice;
  }
  /**
  * Retorna o ticket médio de venda (receita / total de pedidos).
  *
  * @return float Ticket médio.
  */
  public function getOrdersAverageOrderValue() {
    $pedidos = $this->model->getPedidosUsandoDatas(['AVG(price) averageTicket']);
    $averageTicket = round($pedidos[0]['averageTicket'], 2);
    return $averageTicket;
  }
  /**
  * Retorna uma listagem com a quantidade de pedidos por dia.
  *
  * @return array Pedidos por dia.
  */
  public function getOrdersByDate() {
    $pedidos = $model->getPedidos();
    foreach ($pedidos as $key => $value) {
      $obj[$key][$value->order_date] = $value->order_date;
      if(in_array($value->order_date,$obj[$key])) {
        $date[$key] = count($obj[$key]);
      }
    }
    return $this->responseJson($date);
  }
}