<?php

/**
* Arquivo com funções auxiliares para trabalhar com JSON.
*/

function responseJson($data)
{
  $reponse = array(
    'data' => $data
  );
  return json_encode($reponse);
}