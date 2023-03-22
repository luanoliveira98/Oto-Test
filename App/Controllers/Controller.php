<?php

class Controller {
  protected function responseJson($data)
  {
    $reponse = array(
      'data' => $data
    );
    return json_encode($reponse);
  }
}