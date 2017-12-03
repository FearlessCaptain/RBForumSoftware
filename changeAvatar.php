<?php  include_once 'header.php'; ?>

<section class="post-container">
	<div class="post-content">

		<?php
		 	if (isset($_SESSION['u_username'])){
				echo "<p>Change Avatar! Auto resizes to 150px.</p>";
			} else {
				header("Location: index.php?error=logintoaccess");
			}
			?>

    <br>
    <h2>Upload image less then 5mb</h2>
    <form action="includes/uploadAvatar-inc.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
			<input type="hidden" name="userid" value="<?= $_SESSION['u_id'] ?>">
      <button type="submit" class="nav-button" name="submitAvatar"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
    </form>


	</div>
</section>
<?php  include_once 'footer.php'; ?>
