<?php  include_once 'header.php'; ?>


<section class="signup-main">
	<div class="signup-container">

		<h2>Login</h2>
		<?php
			if (isset($_SESSION['u_id'])) {
				header("Location: /index.php?login=success");

			} else {
				echo '<form class="signup-form" action="includes/login-inc.php" method="POST">
						<input type="text" name="username" placeholder="Username/Email">
						<input type="password" name="pwd" placeholder="Password">
						<button class="nav-button" type="submit" name="submit">Login</button>
						</form>
						<button class="nav-button" onclick="location.href=\'signup.php\'" type="button">Signup</button>';
			}
			?>

<!--
			<section class="signup-main">
				<div class="signup-container">

					<h2>Sign Up</h2>
					<form class="signup-form" action="includes\signup-inc.php" method="POST">
						<input type="text" name="username" placeholder="Username">
						<input type="email" name="email" placeholder="Email">
						<input type="password" id="pass1img" name="pwd" placeholder="Password">
						<input type="password" id="pass2img" name="pwd2" placeholder="Renter Password" onkeyup="checkPassImg(); return false;">
						<button class="nav-button" type="submit" name="submit">Sign Up</button>
						<span id="confirmMessageImg" class="confirmMessage"></span>
					</form>
-->
	      </div>
	    </form>
	  </div>
	</div>
</section>

<?php  include_once 'footer.php'; ?>
