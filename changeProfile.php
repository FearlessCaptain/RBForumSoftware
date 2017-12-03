
<?php  include_once 'header.php'; include_once 'includes\dbh-inc.php'; include_once 'includes\loadProfile-inc.php'; include_once 'includes\loadThread-inc.php' ?>
<?php if (!isset($_SESSION['u_username'])){ header("Location: index.php?error=logintoaccess"); } ?>

<section class="thread-container">

	<div class="profile-content">
		<div class="profile-topflex">


		<?php getProfile ($conn, $_SESSION['u_id']); ?>

		<div class="profile-view"><p>
			<h1>Change your profile info...</h1>
			<form action="includes/changeProfile-inc.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="userid" value="<?= $_SESSION['u_id'] ?>">
				<!-- <input type="form" name="nickname" placeholder="Display Name"> -->
				<input type="form" name="flavor" placeholder="Flavor Text">
				<input type="form" name="location" placeholder="Location">
				<input type="form" name="age" placeholder="Age (Numbers only)">
				<textarea class="post-title" rows="4" cols="42" placeholder="About" name="about"></textarea>
				<button type="submit" class="nav-button" name="submitChanges"><i class="fa fa-upload" aria-hidden="true"></i> Change</button>
			</form>
		</div>




<?php  include_once 'footer.php'; ?>
