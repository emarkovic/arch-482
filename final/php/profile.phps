<?php
	include('header.php');
?>
		<section>
			<div class="container">
				<div class="centered">
				<?php
					if ($logged_in) {
				?>
					<h1>Username : <?=$user_info['userName']?></h1>
				<?php
					} else {
						?> <h1>Please log in to view your information.</h1> <?php
					}
				?>
				</div>
			</div>
		</section>
	</body>
</html>