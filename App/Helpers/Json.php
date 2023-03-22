<?php

function responseJson($data)
{
  $reponse = array(
    'data' => $data
  );
  return json_encode($reponse);
}