<?php

$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileError = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$fileExt = explode('.', $fileName);
$fileExtLower = strtolower(end($fileExt));
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

$allowed = array('jpg', 'jpeg', 'png', 'gif');

// Checks for errors and disallowed files
if (in_array($fileExtLower, $allowed)){
  if ($fileError === 0){
    if ($fileSize < 5000000){

      $fileNameNew = uniqid('')."good.jpg";
      $fileDestination = 'uploads/'.$fileNameNew;

      move_uploaded_file($fileTmpLoc, $fileDestination);
      list($w_orig, $h_orig) = getimagesize($fileDestination); // keeps image the same size
      $image = new Imagick();
      //$image->setResolution($w_orig, $h_orig);
      $image->setResolution(10, 10);
      $image->readImage($fileDestination);
      $image->setImageCompression(Imagick::COMPRESSION_JPEG2000);
      $image->setImageCompressionQuality(1);
      $image->setImageFormat("jpg");
      file_put_contents($fileDestination, $image);
      echo "https://a3kp.xyz/$fileDestination";
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
?>
