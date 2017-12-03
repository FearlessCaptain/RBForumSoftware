<?php

include_once 'dbh-inc.php';

if (isset($_POST['delete'])) {
  $threadid= mysqli_real_escape_string($conn, $_POST['threadid']);
  // $sql = "DELETE FROM Threads WHERE ID = $threadid"; // Delete post from the DB
  $sql = "UPDATE `threads` SET `Deleted` = '1' WHERE ID = '".$_POST['threadid']."' "; // Flag post as deleted
  $result = mysqli_query($conn, $sql);
  if (!$result) { // error check
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    header('Location: ../forum.php?error=DeleteSuccess');
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
