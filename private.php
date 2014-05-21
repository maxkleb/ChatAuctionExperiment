<?php
session_start();

include('php/logout_script.php');

function loginForm(){
	echo'
	<div id="loginform">
	<form action="index.php" method="post">
		<p>Please enter your username and choose your room:</p>
		<input type="text" name="name" id="name" maxlength="18" placeholder="Name"/>
		  <select name="roomtype" id="roomtype">
		   <option value="select">Chatroom:</option>
    <option value="general">General</option>
    <option value="other">other</option>
  </select>
		<input type="submit" name="enter" id="enter" value="Enter" />
	</form>
	</div>
	';
}

include('php/login_script.php');
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
<title>Private Chat</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head><body>
<?php
if(!isset($_SESSION['name']) || isset($_GET['logout'])){
	
	loginForm();
	
}
else{
?>
<div id="cont">
	<div id="wrapper">
		<div id="menu">
			<p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
			<p class="logout"><a id="exit" href="#">Exit Chat</a></p>
			<div style="clear:both"></div>
		</div>
	<div id="chatbox"></div>
	<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" maxlength="150" /> 
		 <button name="submitmsg" id="submitmsg">Send</button></form>
</div>
<div id="online_users">
<div id="online_menu">Online Users:</div>
<div id="online_list"></div>
<a href='#' class="button">Settings</a>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
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
			$.post("post_private.php", {text: clientmsg});				
			$("#usermsg").attr("value", "");
		}
		return false;
	});
	
	//Load the file containing the chat log
	function loadLog(){		 
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "php/get_private.php",
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
        // $.get("index.php", {logout: "true"});  do something which displays message user left private chat
		//also got to make a popout so if a user messages someone it pops up
    }
</script>
<?php
}
?>
</body>
</html>