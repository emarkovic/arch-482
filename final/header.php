<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Forum</title>

		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="nav-menu">
			<ul>
				<li class="left" id="logo">
						<i class="fa fa-forumbee"></i>
				</li>
			<?php
				$pages = [
					'Home' => 'index.php',
					'Add a post' => 'add.php',
					'Profile' => '',
					'About' => ''
				];

				foreach ($pages as $key => $page) {
					if ($current_page == $page) {
						?> <li class="middle"><a class="active" href="<?=$page?>"><?=$key?></a></li> <?php
					} else {
						?> <li class="middle"><a href="<?=$page?>"><?=$key?></a></li> <?php
					}
				}
			?>
				
				<li class="right" id="login"><a href="">Login</a></li>
				<li class="right" id="changeTheme">Change Theme</li>
				
			</ul>

		</nav>