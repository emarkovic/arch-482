<?php 
error_reporting(E_ALL);
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ena's Portfolio</title>

		<?php if ($current_page == 'resume.php') { ?>
				<link rel="stylesheet" type="text/css" href="css/resume.css">
		<?php } ?>
		
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<nav>
			<ul class="nav">
				<?php 
					$pages = [
						'Home' => 'index.php', 
						'Contact' => 'contact.php', 
						'Resume' => 'resume.php', 
						'Skills' => 'skills.php', 
						'Projects' => 'projects.php'
					];
					foreach ($pages as $key => $page) {
						if ($current_page == $page) { 
				?>
							<li class="nav-pill active"><?=$key?></li>
				<?php } else { ?>
							<li class="nav-pill"><a href="<?=$page?>"><?=$key?></a></li>
				<?php
						}
					}
				?>
			</ul>
		</nav>
