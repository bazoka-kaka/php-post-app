<?php
  require('config/db.php');

  $id = $_GET['id'];

  $query = "DELETE FROM posts WHERE id = $id";

  if(mysqli_query($conn, $query)) {
    header("Location: index.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }

?>