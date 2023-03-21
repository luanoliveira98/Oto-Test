<?php

class Connection {

  private $connection;

  private $dbSystem;
  private $dbHostname;
  private $dbName;

  public function __construct() {
    require __DIR__.'/../../config/database.php';

    $this->dbSystem = DATABASE_SYSTEM;
    $this->dbHostname = DATABASE_HOSTNAME;
    $this->dbName = DATABASE_DATABASE;
  }

  private function setConnection(): void {
    try {
      $this->connection = new PDO("{$this->dbSystem}:host={$this->dbHostname};dbname={$this->dbName}", DATABASE_USERNAME, DATABASE_PASSWORD);
    } catch (PDOException $e) {
      echo "Erro na conexão: {$e->getMessage()}";
    }
  }

  /**
   * Faz conexão com o banco de dados
   * 
   * @return PDO
   */
  public function getConnection(): \PDO {
    if(!isset($this->connection)) {
      $this->setConnection();
    }

    return $this->connection;
  }
}