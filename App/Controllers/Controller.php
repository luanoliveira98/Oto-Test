<?php

namespace App\Controllers;

/**
* Controlador base para os demais, com funções genéricas.
*/

class Controller {

  /**
   * Método para retorno padrão da API
   * @param   mixed               $data               Dados da requisição
   * @param   int                 $statusCode         Status da requisição
   * 
   * @return  void
   */
  public function response($data = null, int $code = null): void
  {
    switch ($code) {
        case '201':
            $statusCode = "201 Created";
            break;
        case '204':
            $statusCode = "204 No Content";
            break;
        case '400':
            $statusCode = "400 Bad Request";
            break;
        case '404':
            $statusCode = "404 Not Found";
            break;
        case '500':
            $statusCode = "500 Internal Server Error";
            break;
        default:
            $statusCode = "200 OK";
            break;
    }
    header("HTTP/1.1 $statusCode");

    if ($code !== 204) {
      echo json_encode($data);
    }
  }

}