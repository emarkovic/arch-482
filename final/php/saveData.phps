<?php
	include('common.php');

	if (!empty($_POST['title']) && !empty($_POST['content'])) {
		$userId = $db->quote($user_info['userId']);		
		$title = $db->quote($_POST['title']);
		$content = $db->quote($_POST['content']);

		$query = "INSERT INTO post(userId, title, postContent)
			VALUES($userId, $title, $content)";
		$db->query($query);
	}

	header('Location: http://localhost/final/');
	exit();
?>