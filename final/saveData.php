<?php
	$file_name = 'data.txt';

	if (!empty($_POST['post-content'])) {
		file_put_contents($file_name, $_POST['post-content']);
		print file_get_contents($file_name);
	} else {
		print 'post was empty';
	}

	// header('Location: index.php');
	// exit();
?>