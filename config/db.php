<?php
  $conn = mysqli_connect("127.0.0.1", "benzion", "@Benzion123", "phppost");

  if(mysqli_connect_errno()) {
    echo "Failed connecting to mysql: " . mysqli_connect_errno();
  }
?>