<?php

$dbServername = ""; // Your server, usually localhost:someport
$dbUsername = ""; // Your MySQL login name.
$dbPassword = ""; // Your MySQL login password.
$dbName = ""; // DB you are storing your info in.

$conn = mysqli_connect( $dbServername, $dbUsername, $dbPassword, $dbName );

if (!$conn) {
  echo ("conn failed");
  die('DB connection failed.'.mysqli_connect_error());
}
