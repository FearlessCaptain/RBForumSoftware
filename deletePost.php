<?php  include_once 'header.php'; include_once 'includes\loadThread-inc.php'; include_once 'includes\dbh-inc.php'; include_once 'includes\deleteThread-inc.php'?>

<section class="thread-container">
	<div class="thread-content">

		<?php
		 	if (!isset($_SESSION['u_username'])){
				header("Location: index.php?error=logintoaccess");
			}
			?>

			<div class="thread-view">
				<div class="threadtitle-view">
					<p style="font-weight:bold;">Delete comment??</p>
					<p>Comment: <?php getComment($conn, $_GET['postid']) ?></p>
					<br>

					<br>
				</div>
        <form action="includes/deletePost-inc.php" method="POST">
          <input type="hidden" name="postid" value="<?= $_GET['postid']?>">
          <button class="nav-button" type="submit" name="delete">DELETE THIS!!!!!!!!!!111!!!one!!!</button>
        </form>


			</div>

	</div>
</section>
<?php  include_once 'footer.php'; ?>
