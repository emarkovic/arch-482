<?php
	include('header.php');

	if (!empty($_GET['postId'])) {
		$postId = $_GET['postId'];
	} else {
		header('Location: http://localhost/final/');
		exit();
	}
	//post has: postId, userId, catId, views, title, postContnet, timestamp
	$postInfo = get_post_info($db, $postId);
	$userName = get_username($db, $postInfo['userId']);	
?>
	<section class="view-post">
		<div class="container">						
			<p class="right">
				Posted by <?=$userName?>
				<br>
				<?=$postInfo['timestamp']?>
			</p>
			<h1 class="left"><?=$postInfo['title']?></h1>
			<hr>
			<div class="content">
				<p>			
					<?=$postInfo['postContent']?>
				</p>
			</div>
		</div>
	</section>
		
	</body>
</html>
<?php
	function get_post_info($db, $postId) {
		$postId = $db->quote($postId);
		$query = "SELECT * FROM post WHERE postId = $postId";
		
		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0];
	}

	function get_username($db, $userId) {
		$userId = $db->quote($userId);
		$query = "SELECT userName FROM user WHERE userId = $userId";

		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0]['userName'];
	}
?>