<?php
date_default_timezone_set('UTC'); 



if (isset($_POST['submit'])) {
    
    $username = 'Anon';

    $title = 'This is a title';
    if(!empty($_POST['title'])) {
        $title = $_POST['title'];
    }
    
    $post = 'This is a post';
    if(!empty($_POST['post'])) {
        $post = $_POST['post'];
    }

    $time = date('M d, Y @ G:i');

    $file = fopen('data.txt','a');
    fwrite($file, "<div><p>$title</p><p>$post</p><p>Posted by $username at $time</p></div>\n");
    fclose($file);
}

$contents = '';

if (filesize('data.txt') > 0) {
    $file = fopen('data.txt','r');
    $contents = fread($file, filesize('data.txt'));
    fclose($file);   
}


print<<<End
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Theme Swap Test</title>
        <link id="currentcss" href="css/blue.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="dropdown">
            <button id="button" class="dropbtn" >Click Me!</button>
            <ul id="myDropdown" class="dropdown-content">
                <li id="blueButton">Blue</li>
                <li id="greenButton">Green</li>
                <li id="purpleButton">Purple</li>
            </ul>
        </div>


        <form method="post" action="index.php">
        	Topic Title:
            <br>
            <input type="text" name="title" maxlength="100" size="50" placeholder="Title">
            <br>
            Post:
            <br>
            <textarea name="post" rows="10" cols="50" placeholder="Write post here."></textarea>
            <br>
            <input type="submit" name='submit' value="Submit">
        </form>

        <h2>Posts</h2>
        
        $contents
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
End;


?>
