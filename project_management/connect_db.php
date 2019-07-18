<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$con = mysqli_connect("localhost","root","","service_management");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>