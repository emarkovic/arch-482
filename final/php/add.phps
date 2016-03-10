<?php 
include('header.php');
?>
		<section class="add-post-section">
			<div class="container">
				<h1>Add a post</h1>
								
				<form action="saveData.php" method="post" id="post-form">
					<input class="add-post add-post-title" type="text" placeholder="Post title" name="title">					
					<textarea class="add-post add-post-content" name="content" form="post-form" cols="30" rows="10" placeholder="Post content"></textarea>
					<input class="submit right btn" type="submit" value="Post">
				</form>
			</div>
		</section>
	</body>
</html>