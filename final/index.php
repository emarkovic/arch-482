<?php
include('header.php');

$posts = get_posts($db);
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
				<?php				
					foreach($posts as $post) {
						//post has: postId, userId, catId, views, title, postContent, timestamp
						$postId = $post['postId'];
						$title = $post['title'];
						$user = get_user_info2($db, $post['userId'])['userName'];
						$time = $post['timestamp'];


						if (!empty($title) && !empty($user) && !empty($time)) {
						?>
							<div class="post">
								<h2 class="post-title"><a href="viewPost.php?postId=<?=$postId?>"><?=$title?></a></h2>
								<h2 class="post-user"><?=$user?></h2>
								<h2 class="post-created"><?=$time?></h2>
							</div>
							<hr>
						<?php 
					}
				} ?>
				</div>
				<?php
				if ($logged_in) {					
					?> <a class="right btn" id="addPost" href="add.php">Add a post</a> <?php
				}
				?>
				
			<?php
				}
			?>								
			</div>
		</section>
	</body>
</html>

<?php 
	function get_posts($db) {
		$query = "SELECT * FROM post ORDER BY timestamp DESC";
		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}	

	function get_user_info2($db, $id) {
		$id = $db->quote($id);
		$query = "SELECT userName FROM user WHERE userId = $id";
		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0];
	}
?> 

