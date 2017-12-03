<?php

// make into a function

session_start();

if (isset($_POST['submit'])) {


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
        header("Location: ../uploads/$fileNameNew");
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
