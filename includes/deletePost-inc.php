<?php

include_once 'dbh-inc.php';

if (isset($_POST['delete'])) {
  $postid= mysqli_real_escape_string($conn, $_POST['postid']);
  // $sql = "DELETE FROM Posts WHERE ID = $postid"; // Delete the post from the DB
  $sql = "UPDATE Posts SET Deleted = '1' WHERE ID = '".$_POST['postid']."' "; // flag as deleted
  $result = mysqli_query($conn, $sql);
  if (!$result) { // error check
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    header('Location: ../forum.php?error=DeletePostSuccess');
  }
  exit();


/*
  function deletePost($conn, $threadid) {
    echo $threadid;
    $sql = "DELETE FROM `threads` WHERE 'id' = $threadid";

    $result = mysqli_query($conn, $sql);
    echo $result;
    if (!$result) { // error check
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  */


}
