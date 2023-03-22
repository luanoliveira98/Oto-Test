<?php

class Connection {

  private $connection;

  private $dbSystem = DATABASE_SYSTEM;
  private $dbHostname = DATABASE_HOSTNAME;
  private $dbName = DATABASE_DATABASE;

  /**
   * Cria a conexão com o banco de dados
   * 
   * @return void
   */
  private function setConnection(): void {
    try {
      $this->connection = new PDO("{$this->dbSystem}:host={$this->dbHostname};dbname={$this->dbName}", DATABASE_USERNAME, DATABASE_PASSWORD);
    } catch (PDOException $e) {
      echo "Erro na conexão: {$e->getMessage()}";
    }
  }

  /**
   * Retorna a conexão com o banco de dados
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