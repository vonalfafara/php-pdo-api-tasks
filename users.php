<?php

require_once "./db.php";
require_once "./config.php";

class User {
  public $user_id;
  public $username;
}

$db = new Connection();

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
  $query = "SELECT * FROM users";
  if (isset($_GET["user_id"])) {
    $query .= " WHERE user_id = :user_id";
    $stmt = $db->ready($query, [
      "user_id" => $_GET["user_id"]
    ]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
    $result = $stmt->fetch();
    echo json_encode($result, JSON_PRETTY_PRINT);
  } else {
    $stmt = $db->ready($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
    $result = $stmt->fetchAll();
    echo json_encode($result, JSON_PRETTY_PRINT);
  }
} else if ($method === "POST") {
  $query = "INSERT INTO users (username) VALUES (:username)";
  $db->ready($query, [
    "username" => $_POST["username"]
  ]);
  $id = $db->connection->lastInsertId();
  $query = "SELECT * FROM users where user_id = :user_id";
  $stmt = $db->ready($query, [
    "user_id" => $id
  ]);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
  $result = $stmt->fetch();
  echo json_encode($result, JSON_PRETTY_PRINT);
}
