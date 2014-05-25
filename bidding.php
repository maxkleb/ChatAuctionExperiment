<?php 
session_start();
include ('php/db_connect.php');


if(!isset( $_POST['bet'])){
	
header('Location: index.php');
exit();
}
 
$id = $_SESSION['name'];
if($_SESSION['scenario']==3){
$t_room =  $id['name'];
$mod = 4;
$room = $t_room % $mod;
}
else{
$room = $_SESSION['name']/4;}
$bet = $_POST['bet'];
$sto = 100;
$before = $sto - $bet;
$scenario = $_SESSION['scenario'];

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
		<p>Thank you for participation!</p>	
			
	</div>
	
	<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

// jQuery Document
var coun = 0;
$(document).ready(function(){	
	function try_again(){	 
		$.ajax({
			url: "php/try_again.php",
			cache: false,
			success: function(html){		
				$("#loginform").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
		}
		setInterval (try_again, 500);
		});
		
</script>
	
</body>
</html>