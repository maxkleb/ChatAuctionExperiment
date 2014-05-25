<?php
session_start();

//get un-read messages every second and put into the main chat, then when clicked normal private chat in new window

include ('php/db_connect.php');

$name = $_SESSION['name'];
$query = 'SELECT * FROM admintable ;';
$scenario = null;
$result = mysql_query($query);
if(mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
$scenario = $row['scenarioid'];
$time =  $row['time'];}


if(!isset($_SESSION['scenario']) && $scenario!=null){
$_SESSION['scenario'] = $scenario;}

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
	<div id="wrapper">
		<div id="menu">
			<p class="welcome">Welcome!!!</b></p>
			<div style="clear:both"></div>
		</div>
	<div id="chatbox"></div>
	<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" maxlength="150" /> 
		 <button name="submitmsg" id="submitmsg">Send</button></form>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">


var myTime = <?php echo $time;?>;
function countDown() {
	document.form.seconds.value = myTime;
	if (myTime == 0)
	{
		location.href="user_scenario_1.php";
	}
	else if (myTime > 0)
	{
		myTime--;
		setTimeout("countDown()",1000);
	}
}
</script>
<body onload="countDown();">
<form name="form">
Time Left: <input type="text" name="seconds" size="3">
</form>
</body>
<script>
var objDiv = document.getElementById("chatbox");
var lastMessage = "";
objDiv.scrollTop = objDiv.scrollHeight;
// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		if (clientmsg != "")
		{
			$.post("post.php", {text: clientmsg});				
			$("#usermsg").attr("value", "");
		}
		return false;
	});
	
	//Load the file containing the chat log
	function loadLog(){		 
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "php/get_message.php",
			cache: false,
			success: function(thisMessage){	
				if(lastMessage != thisMessage)
				{
					var inputMessage = $("#chatbox").html() + thisMessage;
					$("#chatbox").html(inputMessage);
					lastMessage = thisMessage;
				}			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 1000);	//Reload file every 1 seconds
	
});
    window.onbeforeunload = function(){
         $.get("index.php", {logout: "true"}); 
    }
</script>

</body>
</html>