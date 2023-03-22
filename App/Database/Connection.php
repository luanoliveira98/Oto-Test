<?php

namespace App\Database;

/**
* Conector com o banco de dados.
*/

class Connection {

  private static $connection;

  /**
   * Cria a conexão com o banco de dados
   * 
   * @return void
   */
  private static function setConnection(): void {
    try {
      self::$connection = new \PDO(DATABASE_SYSTEM.":host=".DATABASE_HOSTNAME.";dbname=".DATABASE_DATABASE, DATABASE_USERNAME, DATABASE_PASSWORD);
    } catch (PDOException $e) {
      echo "Erro na conexão: {$e->getMessage()}";
    }
  }

  /**
   * Retorna a conexão com o banco de dados
   * 
   * @return PDO Conexão feita com o banco de dados
   */
  public static function getConnection(): \PDO {
    if(!isset(self::$connection)) {
      self::setConnection();
    }

    return self::$connection;
  }
}