<?php
if(isset($_POST['enter'])){
	if($_POST['name'] == "" || $_POST['name'] == "system" || $_POST['name'] == "System" || $_POST['roomtype'] == "select"){
		echo '<div class="error">Please type in a <b>valid</b> username and select a room.</div>';
		}
	else{
		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
		$_SESSION['roomtype'] = $_POST['roomtype'];
		include 'db_connect.php';
		$result = mysql_query('INSERT INTO users(username, room) VALUES ("'.$_POST['name'].'" , "'.$_SESSION['roomtype'].'")', $db);
		$message = "<div class='msgln'><i>(".date("g:i A").") <b>System:</b> ". $_SESSION['name'] ." has entered the chat room</i><br></div>";
		$result = mysql_query('INSERT INTO '.$_SESSION['roomtype'].'(username, message) VALUES ("'.$_POST['name'].'" , "'.$message.'")', $db);
	}
}
?>