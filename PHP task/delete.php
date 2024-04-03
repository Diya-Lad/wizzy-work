<?php

$conn = new mysqli("localhost", "root", "", "myDB");

$sql = "DELETE FROM person WHERE id={$_REQUEST['id']}";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header("Location: http://localhost/PHP/CRUD_practice.php");
  exit();
?>
