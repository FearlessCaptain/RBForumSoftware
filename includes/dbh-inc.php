<?php

$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "workingtitle";

$conn = mysqli_connect( $dbServername, $dbUsername, $dbPassword, $dbName );

if (!$conn) {
  die('DB connection failed.'.mysqli_connect_error());
}
