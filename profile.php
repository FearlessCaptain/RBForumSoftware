
<?php  include_once 'header.php'; include_once 'includes\dbh-inc.php'; include_once 'includes\loadProfile-inc.php'; include_once 'includes\loadThread-inc.php' ?>
<?php if (!isset($_SESSION['u_username'])){ header("Location: index.php?error=logintoaccess"); } ?>

<section class="thread-container">

	<div class="profile-content">
		<div class="profile-topflex">


		<?php getProfile ($conn, $_GET['userid']); ?>

		<?php if ($_GET['userid'] == $_SESSION['u_id'] ){
			echo '<div class="profile-view"><p>

		    <a href="changeProfile.php"><h1>Change your info... </h1></a>

		    <a href="changeAvatar.php"><h1><p> </p> Change your profile pic...</h1></a>
		    </div>';} ?>




		</div>
	</div>

	<div class="profile-content">
		<?php getPostsByUID ($conn,$_GET['userid'], $_SESSION['u_role']); ?>
	</div>



<?php  include_once 'footer.php'; ?>
