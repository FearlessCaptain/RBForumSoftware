<?php

session_start();

if (isset($_POST['submit'])) {

  if (!extension_loaded('imagick'))
    echo 'imagick not installed';
    

  $file = $_FILES['file'];
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];
  echo "<html>";
  $fileExt = explode('.', $fileName);
  $fileExtLower = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  // Checks for errors and disallowed files
  // UPDATE TO: use imagick file type checker
  //if (in_array($fileExtLower, $allowed)){
  if (in_array($fileExtLower, $allowed)){
    if ($fileError === 0){
      if ($fileSize < 5000000){

        $fileNameNew = uniqid('')."good.jpg";
        $fileDestination = '../uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        list($w_orig, $h_orig) = getimagesize($fileDestination); // keeps image the same size


        $image = new Imagick();
        //  $image->setResolution($w_orig, $h_orig);
        $image->setResolution(10, 10);
        $image->readImage($fileDestination);


        $image->setImageCompression(Imagick::COMPRESSION_JPEG2000);
        //  echo $bob."Compress"; echo "<br>";
        $image->setImageCompressionQuality(1);
        //  echo $bob;
        echo "<br>";
        $image->setImageFormat("jpeg");
        //$image->writeImage($fileDestination."new.jpg", false);
    //    file_put_contents($fileDestination.".jpg", $image);
        file_put_contents($fileDestination, $image);

        header("Location: $fileDestination");
        echo "</html>";
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
