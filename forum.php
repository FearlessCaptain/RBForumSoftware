<?php  include_once 'header.php'; include_once 'includes/loadThread-inc.php'; include_once 'includes/dbh-inc.php';?>

<section class="thread-container">
	<div class="thread-content">

			<div class="forum-view">
				<div class="forum-topics"><h2 class="forum-topicTitles">General Topics</h2><p class="forum-topics-decsription">For general discusion of any topic. :)</p></div>
				<?php if (isset($_SESSION['u_id'])) {
					getAllThreads($conn, $_SESSION['u_role'] );
				} else {
					getAllThreads($conn);
				}; ?>

			</div>

	</div>
</section>
<?php  include_once 'footer.php'; ?>
