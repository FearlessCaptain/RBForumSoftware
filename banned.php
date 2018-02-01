<?php
	session_start();
	date_default_timezone_set('America/New_York');
	include_once 'includes/checkErrors-inc.php';

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
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="theme-color" content="#ffffff">
	<title>BANNED | RB Forum</title>

</head>

<body>
  <h1 class="banned">Sorry, you have been banned.</h1>
</body>
</html>
