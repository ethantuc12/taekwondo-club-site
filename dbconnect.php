<?php
  // Connect to the database
  $servername="localhost";
  $username="root";
  $password="";
  $database_name="UAC";

  $conn = new mysqli($servername, $username, $password, $database_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>