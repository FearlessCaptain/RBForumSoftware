<?php  include_once 'header.php'; ?>

<section class="post-container">
	<div class="post-content">

		<?php
		 	if (isset($_SESSION['u_username'])){
				echo "<p>Post below!</p>";
			} else {
				header("Location: index.php?error=logintoaccess");
			}
			?>
    <form id="postform" action="includes/postmessage-inc.php" method="POST">
      <input type="text" name="title" value="Title" placeholder="Title">
      <input type="hidden" name=""
      <textarea rows="4" cols="42" name="comment"></textarea>
      <button type="submit" class="nav-button" name="sumbit">Post</button>
    </form>

    <br>
    <h2>Upload image less then 5mb</h2>
    <form action="includes/upload-inc.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <button type="submit" class="nav-button" name="submit"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
    </form>


	</div>
</section>
<?php  include_once 'footer.php'; ?>
