<?php

$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "Ja9AuBzSwU";
$dbName = "working title";

$conn = mysqli_connect( $dbServername, $dbUsername, $dbPassword, $dbName );

if (!$conn) {
  echo ("conn failed");
  die('DB connection failed.'.mysqli_connect_error());
}
