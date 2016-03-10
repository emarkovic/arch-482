<?php 
	$hostname = "128.95.103.44";
	$database = "em42";
	$username = "arch482";
	$password = "shazbat";
	
	$theDB = mysql_pconnect($hostname, $username, $password) 
			or die(mysql_error() . mysql_errno());

	mysql_select_db($database, $theDB);
	
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$email = $_POST["email"];
	$query = "INSERT INTO user (userName,userEmail,userPass,themeId) VALUES ('" . $user . "', '" . $email . "', '" . $pass . "', '1');";
	$result = mysql_query($query, $theDB) or die(mysql_error());
	session_start();
	$_SESSION["Name"] = $user;
	$_SESSION["Email"] = $email;
	$_SESSION["Password"] = $pass;
	$_SESSION["Theme"] = "1";
	print  "<span id=\"login\" style=\"float:right\">Log In Success, Hello " . $_SESSION["Name"] . "!</span>";
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link id="currentcss" type="text/css" rel="stylesheet" href = "stylesheetblue.css">
<title>Final Project</title>
<title>Sign Up</title>
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
<form action="signup.php" method="post">
Username:<input type="text" name="username" value="username"><br>
Password:<input type=\"password\" name=\"password\" value=""><br>
Email:<input type="text" name="email" value=""><br>
<input type="submit"></form>
</body>
</html>