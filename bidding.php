<?php 
session_start();
include ('php/db_connect.php');


if(!isset( $_POST['bet'])){
	
header('Location: temp_index.php');
exit();
}
 
$id = $_SESSION['name'];
$room = $_SESSION['name']/4;
$bet = $_POST['bet'];
$sto = 100;
$before = $sto - $bet;
$scenario = $_SESSION['scenario'];
//print " $scenario ";
print"$id $room $bet $before";
$query = "INSERT INTO bidtable (id,room,bet,scenario,beforebid,afterbid) VALUES ('$id','$room','$bet','$scenario','$before',$before);";

mysql_query($query);



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
		<p>Thank you for participation, now you can close the window.</p>	 
	</div>
	
</body>
</html>