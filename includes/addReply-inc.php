<?php

include_once 'createthread-inc.php';
function setReply($threadid, $conn){
  if (isset($_POST['postSubmit'])) {


    // variables from the newthread page
    $username = $_POST['username'];
    $body = strip_tags($_POST['comment']);
    $id = $_POST['id'];
    $sql = "INSERT INTO Posts (Body, OwnerID, Username, ThreadID) VALUES ('$body', '$id', '$username', '$threadid')";
    $result = mysqli_query($conn, $sql);

    if (!$result) { // error check
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header('Location: ../viewthread.php?threadid='.$threadid.'');
    exit();

  }
}
