<?php

namespace App\Controllers;

use App\Services\Pmweb_Orders_Stats;

/**
* Controlador dos dados de pedidos.
*/

class OrdersController extends Controller {

  public function stats() {
    $pmwebOrdersStats = new Pmweb_Orders_Stats();

    $startDate = $_GET['startDate'] ?? null;
    if ($startDate) {
      $pmwebOrdersStats->setStartDate($startDate);
    }

    $endDate = $_GET['endDate'] ?? null;
    if ($endDate) {
      $pmwebOrdersStats->setEndDate($endDate);
    }

    $ordersCount = $pmwebOrdersStats->getOrdersCount();
    $ordersRevenue = $pmwebOrdersStats->getOrdersRevenue();
    $ordersQuantity = $pmwebOrdersStats->getOrdersQuantity();
    $ordersAverageRetailPrice = $pmwebOrdersStats->getOrdersRetailPrice();
    $ordersAverageOrderValue = $pmwebOrdersStats->getOrdersAverageOrderValue();

    $ordersStats = (object) array(
      "orders"=> (object) array(
        "count" => $ordersCount,
        "revenue" => $ordersRevenue,
        "quantity" => $ordersQuantity,
        "averageRetailPrice" => $ordersAverageRetailPrice,
        "AverageOrderValue" => $ordersAverageOrderValue,
      )
    );

    return $this->response($ordersStats);
  }

  public function byDate() {
    $pmwebOrdersStats = new Pmweb_Orders_Stats();
    
    $ordersByDate = $pmwebOrdersStats->getOrdersByDate();

    echo $ordersByDate;
  }

}