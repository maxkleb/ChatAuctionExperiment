<?php 
session_start();
$db = mysql_connect('localhost', 'root', ''); //This is your login credentials for your MySQL Server.
mysql_select_db('chatroom', $db); //If you use the SQL template included this will be default to 'chatroom'.

if(!isset($_SESSION['name'])){
$status = 'yes';

$query = "SELECT * FROM usersonline;";
$result = mysql_query($query);
$count = mysql_num_rows($result);

$query = "INSERT INTO usersonline (ID,online) VALUES ('$count','$status');";
mysql_query($query);
$_SESSION['name'] = $count;
}
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
</style>
<title>Welcome</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head><body>

<div id="loginform">
		<p>Please wait: connecting to other players...</p> 
	</div>

<?php
?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">


// jQuery Document
var myTime = "20";

$(document).ready(function(){	
	function waitFor(){	 
		$.ajax({
			url: "php/wait_client.php?name=<?php$_SESSION['name']?>",
			cache: false,
			success: function(html){		
				$("#loginform").html(html); 					
		  	},
		});
	}
	setInterval (waitFor, 1000);
	});


</script>
</body>
</html>