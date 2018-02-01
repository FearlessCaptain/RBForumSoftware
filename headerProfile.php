<?php
	session_start();
	date_default_timezone_set('America/New_York');
	include_once 'includes/loadProfile-inc.php';
	include_once 'includes/checkErrors-inc.php';
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://use.fontawesome.com/5010c9457b.js"></script>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="theme-color" content="#ffffff">
	<title><?= getUsername($conn, $_GET['userid']);?>'s Profile | RB Forum</title>
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1274764268405150",
    enable_page_level_ads: true
  });
</script>
</head>

<body>
<section class="main-section">

	<div id="myModal" class="modal">
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <p><?php echo errorCheck($conn, htmlspecialchars($_GET["error"] )); ?></p>
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
			<li class="nav-logo"><i class="fa fa-rocket"></i></li>
			<?php
				if ($_SESSION['u_banned'] == 1){
					header("Location: banned.php");
				};
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
// https://css-tricks.com/snippets/javascript/get-url-variables/
function getQueryVariable(variable)
{
	console.log("getVar ran");
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0;i<vars.length;i++) {
	   var pair = vars[i].split("=");
	   if(pair[0] == variable){return pair[1];}
   }
   return(false);
}
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var query = window.location.search.substring(1);

if (query.indexOf("error") != -1) {
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
