<?php
	session_start();
	$_SESSION = array();
	session_destroy();

	header('Location: http://students.washington.edu/em42/arch482/final/');
	exit();
?>