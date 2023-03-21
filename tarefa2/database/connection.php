<?php

require __DIR__.'/../config/database.php';

$hostname = DATABASE_HOSTNAME;
$dbname = DATABASE_DATABASE;

try {
  $connection = new PDO("mysql:host={$hostname};dbname={$dbname}", DATABASE_USERNAME, DATABASE_PASSWORD);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conectado com sucesso";
} catch (PDOException $e) {
  echo "Erro na conexão: {$e->getMessage()}";
}