<?php
include('header.php');

$file_name = 'data.txt';
$posts = file_get_contents($file_name);
?>
		<section class="posts-section">
			<div class="container">
			<?php
				if (empty($posts)) {
					?> <h1>No posts at this time, <a class="btn" href="add.php">add a post</a>!</h1><?php
				} else {
			?>
				<div class="header">
					<h1 class="header-title">Posts</h1>
					<h1 class="header-user">User</h1>
					<h1 class="header-created">Created At</h1>	
				</div>
				<div class="post-area">				
					<div class="post">
						<h2 class="post-title" data-id="1">Post title 1</h2>
						<h2 class="post-user">User1</h2>
						<h2 class="post-created">Time1</h2>
					</div>
					<hr>
					<div class="post">
						<h2 class="post-title" data-id="2">Post title 2</h2>
						<h2 class="post-user">User2</h2>
						<h2 class="post-created">Time2</h2>
					</div>
					<hr>
					<div class="post">
						<h2 class="post-title" data-id="3">Post title 3</h2>
						<h2 class="post-user">User3</h2>
						<h2 class="post-created">Time3</h2>
					</div>
					<hr>
				</div>
				<a class="right btn" id="addPost" href="add.php">Add a post</a>
			<?php
				}
			?>								
			</div>
		</section>
	</body>
</html>