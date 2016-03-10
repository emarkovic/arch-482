<?php

	function logout() {
		session_unset();
		session_destroy();
	}
	function login($success, $id, $theDB) {
		if ($success) {
			session_start();
			$query = "SELECT * FROM user WHERE userId = '" . $id . "';";
			$result = mysql_query($query, $theDB) or die(mysql_error());
			$rec = mysql_fetch_array($result);
			$_SESSION["Name"] = $rec[1];
			$_SESSION["Email"] = $rec[2];
			$_SESSION["Password"] = $rec[3];
			$_SESSION["Theme"] = $rec[4];
			print "
			
			<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\">
		<link id=\"currentcss\" type=\"text/css\" rel=\"stylesheet\" href = \"stylesheetblue.css\">
<title>Final Project</title>
<script>
	function myFunction() {
    	document.getElementById(\"myDropdown\").classList.toggle(\"show\");
	}
	
	function themeswap(color) {
		document.getElementById(\"currentcss\").href = \"stylesheet\" + color + \".css\";
	}
</script>	
</head>
<body>
	<div id=\"container\">
		<ul id=\"nav\">
			<li><a href=\"logintest.php\">Home</a></li>
			<li><a href=\"aboutblue.php\">About</a></li>
			<img src=\"Globe.png\" alt=\"Logo\" style=\"width:35px;height:35px\"/>
			<li><a href=\"images.html\">Profile</a></li>
			<li><a href=\"sourceblue.html\">Source</a></li>
		</ul>
	</div>
    <span id=\"login\" style=\"float:right\">Log In Success, Hello " . $_SESSION["Name"] . "!</span>
	<button onClick=" . session_destroy() . ">Log Out</button>
    <br>    
    <br>
    <br>
	<div id=\"content\">
			<h3>Recent Posts</h3>
			<center><div id=\"limit\">Where recent posts will go</div><center>
	</div>
	

<body>
<div class=\"dropdown\">
<button onClick=\"myFunction()\" class=\"dropbtn\" >Click Me!</button>
	<ul id=\"myDropdown\" class=\"dropdown-content\">
    	<li onClick=\"themeswap('blue')\">Blue</li>
        <li onClick=\"themeswap('green')\">Green</li>
        <li onClick=\"themeswap('purple')\">Purple</li>
	</ul>
</div>
</body>
</html>
";	
		} else {
			print "
			
			<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\">
		<link type=\"text/css\" rel=\"stylesheet\" href = \"stylesheetblue.css\">
<title>Final Project</title>
<script>
	function myFunction() {
    	document.getElementById(\"myDropdown\").classList.toggle(\"show\");
	}
	
	function themeswap(color) {
		document.getElementById(\"currentcss\").href = \"stylesheet\" + color + \".css\";
	}
</script>
</head>
<body>
	<div id=\"container\">
		<ul id=\"nav\">
			<li><a href=\"logintest.php\">Home</a></li>
			<li><a href=\"aboutblue.php\">About</a></li>
			<img src=\"Globe.png\" alt=\"Logo\" style=\"width:35px;height:35px\"/>
			<li><a href=\"images.html\">Profile</a></li>
			<li><a href=\"sourceblue.html\">Source</a></li>
		</ul>
	</div>
    <span id=\"login\" style=\"float:right\"><form action=\"logintest.php\" method=\"post\">
Username:<input type=\"text\" name=\"username\" value=\"username\"><br>
Password:<input type=\"password\" name=\"password\" value=\"password\"><br>
<input type=\"submit\"></form><br>Log In Failed, Try Again.
<div class=\"dropdown\">
<button class=\"dropbtn\"><a href=\"signup.php\">Sign Up?</a></button></div></span>
    <br>    
    <br>
    <br>
	<div id=\"content\">
			<h3>Recent Posts</h3>
			<center><div id=\"limit\">Where recent posts will go</div><center>
	</div>
</body>
</html>
";	
		}	
	}
	
	
	
	$hostname = "128.95.103.44";
	$database = "em42";
	$username = "arch482";
	$password = "shazbat";
	
	$theDB = mysql_pconnect($hostname, $username, $password) 
			or die(mysql_error() . mysql_errno());

	mysql_select_db($database, $theDB);
	
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$success = false;
	$userid = "0";
	
	
	
	$query = "SELECT userId,userName,userPass FROM user;";
	$result = mysql_query($query, $theDB) or die(mysql_error());
	while( $rec = mysql_fetch_array($result) ){ 
		if ($rec[1] == $user and $rec[2] == $pass) {
			$success = true;
			$userid = $rec[0];
		}
	}
	login($success, $userid, $theDB);
?>