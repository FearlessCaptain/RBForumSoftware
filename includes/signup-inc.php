<?php

if (isset($_POST['submit'])) {

  include_once 'dbh-inc.php';

  $username= mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

  // Error handlers
  // Check for empty field
  if (empty($username) || empty($email) || empty($pwd)){
    header("Location: ../signup.php?signup=empty");
    exit();

  }else{
    if (!$pwd == $pwd2){
      header("Location: ../signup.php?signup=mismatch");
      exit();

    } else {
      // Check if usersname chars are valid
      if (ctype_alnum($username) == false){
        header("Location: ../signup.php?signup=unameinvalid");
        exit();

      } else {
        // check if email is valid
        $sql = "SELECT * FROM Users WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $resultCheck > 0){
          header("Location: ../signup.php?signup=email");
          exit();

        } else {
          $sql = "SELECT * FROM Users WHERE Username='$username'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0){
            header("Location: ../signup.php?signup=usernametaken");
            exit();

          } else{

            if ($pwd != $pwd2){
              header("Location: ../signup.php?signup=passwordderror");
              exit();

            } else {
              // Hash Password
              $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
              // Insert the new user into the database
              $date = date('Y-m-d H:i:s');
              $sql = "INSERT INTO Users (Username, Email, pwd, Role, RoleName, JoinDate, FlavorText, Age, Avatar, Location, Profile, Banned) VALUES ('$username', '$email', '$hashedPwd', '0', 'Mold Member', '$date', 'Texty Text', '1', '5a46f5f04a31a.jpg', 'Secret', 'Secret', '0')";
              //mysqli_query($conn, $sql);
              mysqli_query($conn, $sql);
              header("Location: ../login.php?signup=success");
              exit();
            }
          }
        }
      }
    }

  }

} else {
  header("Location: ../signup.php");
  exit();
}
