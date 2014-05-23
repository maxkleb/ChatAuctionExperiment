<?php
session_start();
if(isset($_SESSION['name'])){
	$text = $_POST['text'];
	$message = "<div class='msgln'>(".date("g:i A").") <a href='private.php?u=".$_SESSION['name']."'><b>".$_SESSION['name']."</b></a>: ".stripslashes(htmlspecialchars($text))."<br></div>";
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('chatroom', $db);
	$result = mysql_query('INSERT INTO general (username, message) VALUES ("'.$_SESSION['name'].'" , "'.$message.'")', $db);
}
?>