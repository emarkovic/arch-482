<?php

if( isset($_POST['submit']) ) {
	echo 'wft';
	$username = "Someone";
	if( !empty($_POST['username']) ) $username=$_POST['username'];
	
	$comment = "nothing much.";
	if( !empty($_POST['comment']) ) $comment=$_POST['comment'];

    $ts = date("M d, Y @ G:i");
    $ioc = fopen("comments.txt","a");
    fwrite( $ioc, "<p>On $ts <b>$username</b> had this to say<br> \n<i>$comment</i></p>\n\n" );
    fclose( $ioc );
}

$contents="";

if( filesize("comments.txt")>0 ){
    $ioc = fopen("comments.txt","r");
	$contents = fread($ioc, filesize("comments.txt"));
    fclose( $ioc );
}

print<<<END
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Our Guestbook</title>

</head>
<body>

<h1>Our Guestbook</h1>

<form  method="post" action="index.php" name="bb">
<p>Your Name:<br><input type="text" name="username" placeholder="Your name"></p>
<p>Your Message:<br><textarea rows="5" cols="60" name="comment" placeholder="Enter your message here"></textarea></p>
<p><input type="submit" name="submit" value="post it!"></p>
</form>

<h1>Comments by previous visitors</h1>

$contents

</body>
</html>
END;

?>