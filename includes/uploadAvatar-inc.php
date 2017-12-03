<?php
include_once('dbh-inc.php');
include_once('Image.php');
session_start();

// https://stackoverflow.com/a/10247150

// put the function from upload-inc.php here

if (isset($_POST['submitAvatar'])) {

  if ($_POST['userid'] != $_SESSION['u_id']){
    echo 'Upload error. Logout and login again.';
    exit();
  }
  $userid = $_POST['userid'];
  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.', $fileName);
  $fileExtLower = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($fileExtLower, $allowed)){
    if ($fileError === 0){
      if ($fileSize < 5000000){
        $fileNameNew = uniqid('').".".$fileExtLower;
        echo $fileNameNew;
        $fileDestination = '../uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        // resize image here...


    
        if ($fileExtLower == 'gif' and $fileSize < 700000){
        } else {
          ak_img_resize($fileDestination,$fileDestination,150,150);
        };

        //$img::destroy();
        // $sql = "UPDATE users SET Avatar = `".$fileNameNew."`  WHERE ID = "."$userid";
        $sql = "UPDATE `users` SET `Avatar` = '".$fileNameNew."' WHERE `users`.`ID` = ".$userid;
      //  echo $sql;
        $result = mysqli_query($conn, $sql);
        print_r($result);

        if ($result == 1){
        // header("Location: ../profile.php?userid=".$userid."&error=newavatarsuccess");
          exit();
        }
        exit();
      } else {
        echo "Error: File over size: 5MB";
      }
    } else {
      echo "Error: Error with upload.";
    }
  } else {
    echo "Error: Wrong file type or no file selected! 'jpg', 'jpeg', 'png', 'gif' types only!";

  }
}
