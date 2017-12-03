<?php
	session_start();
	date_default_timezone_set('America/New_York');
	/*
	print_r($_SERVER);
	if ($_SERVER['QUERY_STRING'] == 'empty'){
		echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span><strong>Danger!</strong> Indicates a dangerous or potentially negative action.</div>';
	} else {
		echo 'ajajnsds';
	};*/
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://use.fontawesome.com/5010c9457b.js"></script>
	<!-- <script src="js/notificationdonttuch.js"></script>-->
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="theme-color" content="#ffffff">
	<title>Working Title</title>



</head>
<body>
<section class="main-section">

	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <p>Some text in the Modal..</p>
	  </div>

	</div>

<header>
	<div class="nav-login">
		<nav>
		<ul class="navboi">
			<li><a class="nav-button" href="index.php"><i class="fa fa-home fa-lg"></i> Home</a></li>
			<li><a class="nav-button" href="profile.php?userid=<?= $_SESSION['u_id']?> "><i class="fa fa-bell fa-lg"></i> Profile</a></li>
			<li><a class="nav-button" href="newthread.php"><i class="fa fa-envelope fa-lg"></i> New Thread</a></li>
			<li><a class="nav-button" href="forum.php"><i class="fa fa-users fa-lg"></i> Forums</a></li>
			<li><!-- Trigger/Open The Modal -->
			<button id="myBtn">Open Modal</button></li>
			<li class="nav-logo"><i class="fa fa-rocket"></i></li>
			<?php
				if (isset($_SESSION['u_id'])) {
					echo '<li class="nav-text"><p>Welcome&nbsp'.$_SESSION["u_username"].'&nbsp</p></li>';
					echo '<li><form action="includes/logout-inc.php" method="POST">
							<button class="nav-button" type="submit" name="submit">Logout</button>
							</form></li>';

				} else {
					echo '<li><form action="includes/login-inc.php" method="POST">
							<input type="text" name="username" placeholder="Username/Email">
							<input type="password" name="pwd" placeholder="Password">
							<input type="hidden" name="location" value="'. explode('/', $_SERVER['REQUEST_URI'])[2] .'">
							<button class="nav-button" type="submit" name="submit">Login</button>
							</form></li>
							<li><button class="nav-button" onclick="location.href=\'signup.php\'" type="button">Signup</button></li>';
				}
				?>
		</ul>
	</div>
	</nav>
	<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
		modal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
		modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
		if (event.target == modal) {
				modal.style.display = "none";
		}
}
</script>
</header>
