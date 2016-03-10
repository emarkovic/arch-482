<?php
	session_start();

	$db = start_database();
	$logged_in = is_logged_in();
	//will be an empty array if not logged in	
	$user_info = get_current_user_info($db);

	function start_database() {
		$host = '128.95.103.44';
		$dbname = 'em42';	

		$dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
		$username = 'arch482';
		$password = 'shazbat';

		//mysql_pconnect was not working in my dev environment so I used PDO
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		

		return $db;
	}

	function is_logged_in() {
		return !empty($_SESSION['userId']);		
	}

	function get_current_user_info($db) {
		if (is_logged_in()) {
			$id = $db->quote($_SESSION['userId']);
			
			$query = "SELECT userId, userName, themeId FROM user
				WHERE userId = $id";
			return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0];
		} else {
			return [];
		}
	}

	function get_theme_name($db, $themeId) {
		$themeId = $db->quote($themeId);
		$query = "SELECT themeName FROM theme WHERE themeId = $themeId";
		return $db->query($query)->fetchAll(PDO::FETCH_ASSOC)[0]['themeName'];
	}
?>