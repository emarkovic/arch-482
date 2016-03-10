<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href = "stylesheetblue.css">
<title>Final Project</title>
</head>
<body>
	<div id="container">
		<ul id="nav">
			<li><a href="logintest.php">Home</a></li>
			<li><a href="aboutblue.php">About</a></li>
			<img src="Globe.png" alt="Logo" style="width:35px;height:35px"/>
			<li><a href="images.html">Profile</a></li>
			<li><a href="sourceblue.html">Source</a></li>
		</ul>
	</div>
	<div id="content">
			<h3>How Our Page Works</h3>
			<center><div id="limit">This is an online discussion forum for people to post on. 
            
            </div><center>
            <?php
				if ($_SESSION["Name"]) {
					print "<span id=\"login\" style=\"float:right\">Log In Success, Hello " . $_SESSION["Name"] . "!</span>";
				}
			?>
	</div>
</body>
</html>