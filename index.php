<?php  include_once 'header.php'; ?>

<section class="main-container">
	<div class="content">
		<h2>Home</h2>
		<?php
		 	if (isset($_SESSION['u_username'])){
				echo "You are logged in!";
				echo "<br>";
				echo $_SESSION['u_username'];
				echo '<li><button class="nav-button" onclick="location.href=\'post.php\'" type="button">Post</button>';
			}
			?>
		<img class="front-img" src="https://i.imgur.com/srCKVyr.jpg">
	</div>
</section>


<?php  include_once 'footer.php'; ?>
