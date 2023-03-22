<?php

/**
* Arquivo com funções auxiliares para trabalhar com datas.
*/

/**
* Retorna data no formato Y-m-d.
* @param string $date Data para conversão.
*
* @return string Data convertida.
*/
function DateWithoutTime(string $date): string
{
  $datetime = new DateTime($date);
  $dateWithoutTime = $datetime->format('Y-m-d');
  return $dateWithoutTime;
}