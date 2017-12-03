<?php

session_start();

if (isset($_POST['submit'])) {

  include 'dbh-inc.php';

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $location = $_POST['location'];

  if (empty($username) || empty($pwd)) {
//  if (True) {
    header("Location: ../index.php?login=empty");
    exit();

  } else {
      $sql = "SELECT * FROM Users WHERE Username='$username' OR Email='$email'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck < 1) {
        header("Location: ../index.php?login=unameerror");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          // Check password against hash in DB
          $hashedPwdCheck = password_verify($pwd, $row['pwd']);
          if ($hashedPwdCheck == false){
            header("Location: ../index.php?login=pwderror");
            exit();
          } elseif ($hashedPwdCheck == true) {
            // login the user if all legit
            $_SESSION['u_id'] =$row['ID'];
            $_SESSION['u_username'] =$row['Username'];
            $_SESSION['u_email'] =$row['ID'];
            $_SESSION['u_role'] =$row['Role'];
            header("Location: ../". $location );
            exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}
