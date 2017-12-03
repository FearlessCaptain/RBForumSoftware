<?php  include_once 'header.php'; include_once 'includes\loadThread-inc.php'; include_once 'includes\dbh-inc.php';?>

<section class="thread-container">
	<div class="thread-content">

		<?php
		 	if (!isset($_SESSION['u_username'])){
				header("Location: index.php?error=logintoaccess");
			} ?>

			<div class="forum-view">
				<?php getAllThreads($conn, $_SESSION['u_role']); ?>

			</div>

	</div>
</section>
<?php  include_once 'footer.php'; ?>
