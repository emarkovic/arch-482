<?php
	include('common.php');

	if (!empty($_POST['userName']) && !empty($_POST['email']) && !empty($_POST['password'])) {		
		$userName = $db->quote($_POST['userName']);
		$email = $db->quote($_POST['email']);
		$password = $db->quote($_POST['password']);	

		if (strlen($userName) > 50) {
			error('User name is too long.');
		}
		if (strlen($email) > 100) {
			error('Email is too long.');
		}
		if (strlen($password) > 20) {
			error('Password is too long.');
		}

		if (!exists($db, $email)) {
			$query = "INSERT INTO user(userName, userEmail, userPass, themeId) 
			VALUES($userName, $email, $password, 1)";
			$db->query($query);
			$id = $db->lastInsertId();
			$_SESSION['userId'] = $id;
		} else {
			error('User already exists.');
		}

		header('Location: http://localhost/final/');
		exit();
	} else {
		error('Enter a user name, email and password.');
	}

	function error($error_message) {
		header("Location: http://localhost/final/signupForm.php?error=$error_message");
		exit();
	}

	function exists($db, $email) {		
		$query = "SELECT userId FROM user WHERE userEmail = $email";
		$results = $db->query($query)->fetchAll();
		return !empty($results);
	}
?>