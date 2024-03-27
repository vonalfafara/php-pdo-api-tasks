<?php

require_once "./db.php";
require_once "./config.php";

class Task {
  public $task_id;
  public $task_title;
  public $task_description;
  public $user_id;
}

$db = new Connection();

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
  if (isset($_GET["task_id"]) || isset($_GET["user_id"])) {
    $where_clauses = [];
    foreach ($_GET as $key => $param) {
      $where_clauses[] = "$key = :$key";
    }
    $query = "SELECT * FROM tasks WHERE " . implode(" AND ", $where_clauses);
    $stmt = $db->ready($query, $_GET);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Task");
    $result = $stmt->fetchAll();
    echo json_encode($result, JSON_PRETTY_PRINT);
  } else {
    $query = "SELECT * FROM tasks";
    $stmt = $db->ready($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Task");
    $result = $stmt->fetchAll();
    echo json_encode($result, JSON_PRETTY_PRINT);
  }
} else if ($method === "POST") {
  $query = "INSERT INTO tasks (task_title, task_description, user_id) VALUES (:task_title, :task_description, :user_id)";
  $db->ready($query, [
    "task_title" => $_POST["task_title"],
    "task_description" => $_POST["task_description"],
    "user_id" => $_POST["user_id"]
  ]);
  echo json_encode([
    "message" => "Data inserted"
  ], JSON_PRETTY_PRINT);
} else if ($method === "PUT") {
  parse_str(file_get_contents('php://input'), $post_input);
  $query = "UPDATE tasks SET task_title = :task_title, task_description = :task_description, task_status = :task_status
  WHERE task_id = :task_id";
  $db->ready($query, [
    "task_title" => $post_input["task_title"],
    "task_description" => $post_input["task_description"],
    "task_status" => $post_input["task_status"],
    "task_id" => $_GET["task_id"],
  ]);
  echo json_encode([
    "message" => "Data updated"
  ], JSON_PRETTY_PRINT);
} else if ($method === "DELETE") {
  $query = "DELETE from tasks WHERE task_id = :task_id";
  $db->ready($query, [
    "task_id" => $_GET["task_id"]
  ]);
  echo json_encode([
    "message" => "Data deleted"
  ], JSON_PRETTY_PRINT);
}