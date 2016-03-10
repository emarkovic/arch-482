<?php
	include('common.php');
	$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href = "css/main.css">
		<link rel="stylesheet" href="css/green.css">
<title>Final Project</title>
</head>
<body>
	<nav class="nav">
		<ul>
			<li class="left" id="logo">
				<img src="icon.png" alt="Logo" style="width:35px;height:35px"/>
			</li>
		<?php
			$pages = [
					'Home' => 'index.php',					
					'About' => 'about.php',
					'Profile' => '',				
					'Source' => ''
				];
			
			if ($logged_in) {
				$pages['Add a post'] = 'add.php';
			}
			foreach ($pages as $key => $page) {
				if ($current_page === $page) {	
					?> <li><a class="active" href="<?=$page?>"><?=$key?></a></li><?php
				} else {
					?> <li><a href="<?=$page?>"><?=$key?></a></li><?php
				}
			}

			if ($logged_in) {
				if ($current_page === 'logoutForm.php') {
					?> <li class="right"><a class="active" href="logout.php">Logout</a></li> <?php
				} else {
					?> <li class="right"><a href="logout.php">Logout</a></li> <?php
				}
			} else {
				if ($current_page === 'loginForm.php') {
					?> <li class="right"><a class="active" href="loginForm.php">Login</a></li> <?php
				} else {
					?> <li class="right"><a href="loginForm.php">Login</a></li> <?php
				}
			}				
		?>
<!-- 			<li><a href="">Home</a></li>			
			<li><a href="">About</a></li>
			<li><a href="">Profile</a></li>
			<li><a href="">Source</a></li>
			<li><a href="">Add a post</a></li>

			<li class="right"><a href="">Login</a></li> -->
			<li class="right"><a href="">Change theme</a></li>
		</ul>
	</nav>