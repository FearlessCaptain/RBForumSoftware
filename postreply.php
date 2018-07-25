<?php  include_once 'header.php'; include_once 'includes/addReply-inc.php'; include_once 'includes/dbh-inc.php';?>

<section class="thread-container">
	<div class="thread-content">

		<?php
		 	if (!isset($_SESSION['u_username'])){
				header("Location: index.php?error=logintoaccess");
			}
			?>

    <?php echo'<form class="postreply" action="'.setReply($_GET['threadid'], $conn).'" method="POST">';?>
			<p>Post reply!</p>
      <input type="hidden" name="username" value="<?php echo $_SESSION['u_username'];?>">
      <input type="hidden" name="id" value="<?php echo $_SESSION['u_id'];?>">
      <textarea class="post-title" rows="4" cols="42" name="comment"></textarea><br>
      <button type="submit" class="nav-button" name="postSubmit">Post</button>
    </form>



	</div>
</section>
<?php  include_once 'footer.php'; ?>
