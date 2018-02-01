<?php
include_once('../header.php');
include_once('safeEscape-inc.php');

function truncString($string, $len){
  return substr($string, 0, $len);
}

if (isset($_POST['submitChanges'])) {


  include_once 'dbh-inc.php';

	$id = mysqli_real_escape_string($conn, $_POST['userid']);
	if ($_SESSION['u_id'] == $id ) {
	  $nickname = truncString( mysqli_real_escape_string($conn, $_POST['nickname']), 50);
	  $flavor = truncString( mysqli_real_escape_string($conn, $_POST['flavor']), 50);
	  $location = truncString( mysqli_real_escape_string($conn, $_POST['location']), 70);
	  $age = mysqli_real_escape_string($conn, $_POST['age']);
	  $about = truncString( mysqli_real_escape_string($conn, $_POST['about']), 1000);

		$info_array = array_filter(array( 'Nickname' => $nickname, 'FlavorText' => $flavor, 'Location' => $location, 'Age' => $age, 'Profile' => $about ));
		//print_r($info_array);
		$sql = "UPDATE Users SET ";

		foreach ($info_array as $k => $v){
		  $sql = $sql . " " . $k . " = '" . $v . "',";
		};
		$sql = substr($sql , 0, -1);

		$sql = $sql . " WHERE ID = ". $id;
		//echo $sql;
		$result = mysqli_query($conn, $sql);
		//print_r($result);
		/*$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
			echo "Dang error";
			print_r($resultCheck);
		}*/
		header('Location: ../changeProfile.php');
	} else {
		echo 'Auth error';
	}
}
