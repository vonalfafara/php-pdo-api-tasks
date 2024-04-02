<?php

class Connection {
  public $connection;
  private $host = "dpg-co5pi4cf7o1s73a5d0k0-a";
  private $dbname = "task_manager_db_a8i2";
  private $user = "vsalfafara";
  private $pass = "pcYh6GS2ATjp6s3C4w6eTumXZzL07AEz";
  private $charset = "utf8mb4";
  private $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  public function __construct() {
    $dsn = "pgsql:host=$this->host;dbname=$this->dbname";
    $this->connection = new PDO($dsn, $this->user, $this->pass, $this->options);
  }

  public function ready($query, $params = []) {
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }
}