<?php
if (isset($_GET["id"])) {
  $connection = new mysqli("localhost", "root", "", "library");

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $id = $_GET["id"];
  $stmt = $connection->prepare("DELETE FROM books WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

header("Location: index.php");
exit;
