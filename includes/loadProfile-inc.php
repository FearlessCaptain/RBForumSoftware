<?php

include_once 'includes/loadThread-inc.php';

function getProfile ($conn, $id) {
  $sql = "SELECT * FROM Users WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  /*
  if ($row['Nickname'] == ''){
    $nickname = $row['Username'];
  } else { $nickname = $row['Nickname']; }
  */
  $nickname = $row['Username'];

  if ($row['Age'] == '0'){
      $age = 'Secret';
    } else { $age = $row['Age']; }

  //  echo '<p>'$row['owner_name'] $row['body'];

  echo '
  <div class="profile-view">
    <img class="avatar-view" src="uploads/'.$row['Avatar'].'">
    <ul class="profile-info">
      <li><span class="font-bold">Username: </span>'.$nickname.'</li>
      <li><span class="font-bold">Flavortext: </span><i>'.$row['FlavorText'].'</i></li>
      <li><span class="font-bold">Rank: </span>'.$row['RoleName'].'</li>
      <li><span class="font-bold">Join Date: </span>'.$row['JoinDate'].'</li>
      <li><span class="font-bold">Location: </span>'.$row['Location'].'</li>
      <li><span class="font-bold">Age: </span>'.$age.'</li>
      <li><span class="font-bold">About Me: </span>'.$row['Profile'].'</li>
    </ul>

  </div>
    ';

}

function getProfileDesc ($conn, $id) {
  $sql = "SELECT Profile FROM Users WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
  echo mysqli_fetch_assoc($result)['Profile'];
}

function getUsername ($conn, $id) {
  $sql = "SELECT Username FROM Users WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
  return mysqli_fetch_assoc($result)['Username'];

}

function uploadProfileImage($conn, $id){
}


/*

*/
