<?php
if(isset($_GET['logout'])){	

	echo $_GET['logout'];
	if ($_GET['logout'] == "true")
	{
		   //in logout.php remove user from database of logged in users and destroy session and all that stuff.
	//Simple exit message
	$message = "<div class='msgln'><i>(".date("g:i A").") <b>System:</b> ". $_SESSION['name'] ." has left the chat room</i><br></div>";
	
	include 'db_connect.php';
	$result = mysql_query('DELETE FROM users WHERE username="'.$_SESSION['name'].'" AND room="'.$_SESSION['roomtype'].'"', $db);
	$result = mysql_query('INSERT INTO '.$_SESSION['roomtype'].'(username, message) VALUES ("'.$_SESSION['name'].'" , "'.$message.'")', $db);
	session_destroy();
	header('Location: index.php?logout=out'); //Redirect the user
	}
	if ($_GET['logout'] == "out")
	{
		echo '<div class="error">You are now logged out.</div>';
	}
}
?>