<?php
session_start();

//get un-read messages every second and put into the main chat, then when clicked normal private chat in new window

//check if users username is in either of the two username fields in private message db and if the user has not read it then show message

//isset($_SESSION['test']);
//$_SESSION['test'] = "test!!";
include('php/logout_script.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
a.button {
	/* styles for button */
	text-align:center;
	background-color: #BFEFFF;
	
	width:50px;
	padding: 4px 10px 4px;
	color: #fff;
	text-decoration: none;
	font-weight: bold;
	line-height: 1;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
	border-bottom: 1px solid rgba(0,0,0,0.25);
	cursor: pointer;
}
a.button:hover {
	background-color: #99FFFF;
}
a.button:active {
	background-color: #BFDFFF;
}
</style>
<title>Chatroom</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head><body>
<div id="cont">
	<div id="loginform">
	<form action="bidding.php" method="post"">
		<p>Please choose your amount:</p>
		<input type="text" name="bet" maxlength="18" />
		 
		<button name="button" id="button">Done</button>
	</form>
	</div>
	
</body>
</html>