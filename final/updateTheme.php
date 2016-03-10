<?php
	include('common.php');

	if (!empty($_GET['themeName'])) {
		$themeName = $_GET['themeName'];
		setcookie('themeName', $themeName);
		if ($logged_in) {
			$userId = $db->quote($user_info['userId']);
			
			$themeId = get_theme_id($db, $themeName);

			$query = "UPDATE user
				SET themeId = $themeId
				WHERE userId = $userId";
			$db->query($query);
		} 
	}

	header("Location: http://localhost/final/index.php");
	exit();

	function get_theme_id($db, $themeName) {
		$themeName = $db->quote($themeName);
		$query = "SELECT themeId FROM theme WHERE themeName = $themeName";
		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0]['themeId'];
	} 
?>