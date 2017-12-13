<?php

include_once("includes/dbh-inc.php");
include_once("header.php");
include_once("includes/Image.php");
function getAvatar($conn, $userid){
  $sql = "SELECT Avatar FROM Users WHERE ID = '$userid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return 'uploads/'.$row['Avatar'];
}

//This function prints a text array as an html list.


if (!extension_loaded('imagick'))
    echo 'imagick not installed';


?>



<html>
<p class="author-view"><a href="profile.php?userid=4">asdfasdf</a></p>
