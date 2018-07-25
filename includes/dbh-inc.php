<?php

$dbServername = "localhost:3306";
$dbUsername = "kevinglassweb";
$dbPassword = "Newpass1";
$dbName = "kevinglassweb_workingtitle2";

$conn = mysqli_connect( $dbServername, $dbUsername, $dbPassword, $dbName );

if (!$conn) {
  echo ("conn failed");
  die('DB connection failed.'.mysqli_connect_error());
}
