<?php
	include('common.php');
	$current_page = basename($_SERVER['PHP_SELF']);
	$stylesheet = (!empty($_COOKIE['themeName']) ? $_COOKIE['themeName'] : 'blue');
	if ($logged_in) {
		$themeId = $user_info['themeId'];
		$stylesheet = get_theme_name($db, $themeId);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href = "css/main.css">
		<link id="currentCss" rel="stylesheet" href="css/<?=$stylesheet?>.css">
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
					'Profile' => 'profile.php',				
					'Source' => 'source.php'
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
			<li class="right">
				<span id="changeTheme">Change theme</span>
				<select data-page="<?=$current_page?>" id="theme">
				<?php
					if ($stylesheet === 'purple') {
						?> <option value="purple" selected>Purple</option> <?php	
					} else {
						?> <option value="purple">Purple</option> <?php	
					}

					if ($stylesheet === 'blue') {
						?> <option value="blue" selected>Blue</option> <?php 
					} else {
						?> <option value="blue">Blue</option> <?php 
					}

					if ($stylesheet === 'green') {
						?> <option value="green" selected>Green</option> <?php 
					} else {
						?> <option value="green">Green</option> <?php 
					}
				?>
					
					
										
				</select>
			</li>
		</ul>
	</nav>

	<script src="js/main.js"></script>