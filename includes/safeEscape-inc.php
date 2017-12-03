<?php



function escapeBody($conn, $text){
  return mysqli_real_escape_string($conn, str_replace('\r\n', '', nl2br(htmlspecialchars($text))));
      //   mysqli_real_escape_string($conn, str_replace('\r\n', '', nl2br(htmlspecialchars(strip_tags($_POST['comment'])))));
}
