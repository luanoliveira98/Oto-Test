<?php
/**
* Sumarizações de dados transacionais de pedidos.
*/
class Pmweb_Orders_Stats {
/**
* Define o período inicial da consulta.
* @param String $date Data de início, formato `Y-m-d` (ex, 2017-08-24).
*
* @return void
*/
public function setStartDate($date) {
}
/**
* Define o período final da consulta.
*
* @param String $date Data final da consulta, formato `Y-m-d` (ex, 2017-08-24).
*
* @return void
*/
public function setEndDate($date) {
}
/**
* Retorna o total de pedidos efetuados no período.
*
* @return integer Total de pedidos.
*/
public function getOrdersCount() {
}
/**
* Retorna a receita total de pedidos efetuados no período.
*
* @return float Receita total no período.
*/
public function getOrdersRevenue() {
}
/**
* Retorna o total de produtos vendidos no período (soma de quantidades).
*
* @return integer Total de produtos vendidos.
*/
public function getOrdersQuantity() {
}
/**
* Retorna o preço médio de vendas (receita / quantidade de produtos).
*
* @return float Preço médio de venda.
*/
public function getOrdersRetailPrice() {
}
/**
* Retorna o ticket médio de venda (receita / total de pedidos).
*
* @return float Ticket médio.
*/
public function getOrdersAverageOrderValue() {
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
?>
