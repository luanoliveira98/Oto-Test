<?php

class Base {

  private $databaseConnection;
  protected $table;

  public function __construct() {
    require __DIR__.'/../Database/Connection.php';

    $connection = new Connection();
    $this->databaseConnection = $connection->getConnection();
  }

  public function select(): array
  {
    $sql = "SELECT * FROM {$this->table}";
    $stmt = $this->databaseConnection->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return [];
  }
}