<?php

include __DIR__.'/../Database/Connection.php';

class Base {

  private $databaseConnection;
  protected $table;

  public function __construct() {
    $connection = new Connection();
    $this->databaseConnection = $connection->getConnection();
  }

  /**
   * Adiciona ao $this->sql o SQL base para uma query de busca
   * @param array $fields Campos para busca (ex, ['order_id', 'order_date', 'price']).
   * 
   * @return self
   */
  public function select(array $fields = ['*']): self
  {
    $fieldsSearch = implode(', ', $fields);
    $this->sql = "SELECT {$fieldsSearch} FROM {$this->table}";

    return $this;
  }

  /**
   * Adiciona ao $this->sql o SQL de uma condicinal
   * @param string $field Campo da condicional (ex, quantity).
   * @param string $value Valor a comparar (ex, 1).
   * @param string $operator Sinal da operação da condicional (ex, >).
   * 
   * @return self
   */
  public function where(string $field, string $value, string $operator = "="): self
  {
    if (!str_contains($this->sql, 'WHERE')) {
      $this->sql .= " WHERE ";
    } else {
      $this->sql .= " AND ";
    }
    $this->sql .= "{$field} {$operator} '{$value}'";

    return $this;
  }

  /**
   * Executa a query presente em $this->sql
   * 
   * @return array
   */
  public function get(): array
  {
    $stmt = $this->databaseConnection->prepare($this->sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return [];
  }
}