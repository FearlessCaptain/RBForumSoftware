<?php
include_once 'header.php';
include_once 'includes/createthread-inc.php';
 ?>

<section class="post-container">
	<div class="post-content">

		<?php
		 	if (isset($_SESSION['u_username'])){
				echo "<p>Post new thread below!</p>";
			} else {
				header("Location: index.php?error=logintoaccess");
			}
			?>

    <form action="includes/createthread-inc.php" method="POST">
      <input type="text" class="post-title" name="title" value="" placeholder="Title">
      <input type="hidden" name="username" value="<?php echo $_SESSION['u_username'];?>">
      <input type="hidden" name="id" value="<?php echo $_SESSION['u_id'];?>">
      <textarea class="post-title" rows="4" cols="42" name="comment"></textarea><br>
      <button type="submit" class="nav-button" name="threadSubmit">Post</button>
    </form>

    <br>
    <h2>Upload image less then 5mb</h2>
    <h3>Currently doesn't work Will roll into one.</h3>
    <form action="includes/upload-inc.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="hidden" name="location" value=" <?= $_GET['threadid'] ?> ">
      <button type="submit" class="nav-button" name="submit"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
    </form>


	</div>
</section>
<?php  include_once 'footer.php'; ?>
