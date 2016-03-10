<?php
	include('common.php');

	if (!empty($_POST['email']) && !empty($_POST['password'])) {		
		$email = $db->quote($_POST['email']);
		$password = $db->quote($_POST['password']);		

		$query = "SELECT userId FROM user 
			WHERE userEmail = $email
			AND userPass = $password";
		$results = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($results)) {		
			session_start();	
			$_SESSION['userId'] = $results[0]['userId'];
			header('Location: http://students.washington.edu/em42/arch482/final/');
			exit();
		} else {
			error('User does not exist.');
		}

	} else {
		error('Enter an email and password.');
	}

	function error($error_message) {
		header("Location: http://students.washington.edu/em42/arch482/final/loginForm.php?error=$error_message");
		exit();
	}
?>