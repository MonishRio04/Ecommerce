<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'd-mart';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check for an error
if(mysqli_connect_error()) {
  echo mysqli_connect_error();
  exit;
}
?>