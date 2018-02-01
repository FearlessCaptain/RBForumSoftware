<?php  include_once 'header.php'; ?>

<script type="text/javascript">

function checkPassImg(){
	console.log(5+6);
	//Store the password field objects into variables ...
	var pass1 = document.getElementById('pass1img');
	var pass2 = document.getElementById('pass2img');
	//Store the Confimation Message Object ...
	var message = document.getElementById('confirmMessageImg');
	//Set the colors we will be using ...
	var goodColor = "#66cc66";
	var badColor = "#ff6666";
	//Compare the values in the password field
	//and the confirmation field
	if(pass1.value == pass2.value){
		//The passwords match.
		//Set the color to the good color and inform
		//the user that they have entered the correct password
		pass2.style.backgroundColor = goodColor;
		message.style.color = goodColor;
		message.innerHTML = '<i class="fa fa-check-circle fa-lg"></i>';
	}else{
		//The passwords do not match.
		//Set the color to the bad color and
		//notify the user.
		pass2.style.backgroundColor = badColor;
		message.style.color = badColor;
		message.innerHTML = '<i class="fa fa-times-circle fa-lg"></i>';
	}
}

</script>

<section class="signup-main">
	<div class="signup-container">

		<h2>Sign Up</h2>
		<form class="signup-form" action="includes/signup-inc.php" method="POST">
			<input type="text" name="username" placeholder="Username">
			<input type="email" name="email" placeholder="Email">
			<input type="password" id="pass1img" name="pwd" placeholder="Password" onkeyup="checkPassImg(); return false;">
			<input type="password" id="pass2img" name="pwd2" placeholder="Renter Password" onkeyup="checkPassImg(); return false;">
			<button class="nav-button" type="submit" name="submit">Sign Up</button>
			<span id="confirmMessageImg" class="confirmMessage"></span>
		</form>



	      </div>
	    </form>
	  </div>
	</div>
</section>

<?php  include_once 'footer.php'; ?>
