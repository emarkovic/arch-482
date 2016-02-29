<?php
	$host = '128.95.103.44';
	$dbname = 'caup';	

	$dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
	$username = 'arch482';
	$password = 'shazbat';

	//mysql_pconnect was not working in my dev environment so I used PDO
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
?>