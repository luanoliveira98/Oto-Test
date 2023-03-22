<?php

/**
* Rotas da aplicação.
*/

use CoffeeCode\Router\Router;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,PUT,PATCH,POST,DELETE");

$router = new Router(BASE_URL);

/**
 * Controllers
 */
$router->namespace("App\Controllers");

/**
 * Pedidos
 */
$router->group("orders");
$router->get("/stats", 'OrdersController:stats');
$router->get("/by-date", 'OrdersController:byDate');

$router->dispatch();