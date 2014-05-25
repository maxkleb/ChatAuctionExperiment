
<?php
session_start();
include ('php/db_connect.php');
$_SESSION['roomtype'] = "General";
isset($_SESSION['scenario']);
$_SESSION['scenario'] = '';
isset($_SESSION['Start']);
$_SESSION['Start'] = '';
isset($_SESSION['Group']);
$_SESSION['Group'] = '';

function WitForFull(){
echo'
<div id="loginform">
		<p>Please wait: connecting of other players...</p> 
	</div>
';
}

function StartTheGame(){
	echo'
	<div id="loginform">
	<form action="admin.php" method="post">
		<p>please choose the scenario :</p>
		<input type="text" name="name" id="name" maxlength="18" placeholder="Name"/>
		  <select name="scenario" id="scenario">
		   <option value="select">Scenario:</option>
    <option value="First">General</option>
    <option value="Second">Second</option>
	<option value="Third">Third</option>
  </select>
		<input type="submit" name="enter" id="enter" value="Enter" />
	</form>
	</div>
';
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
<title>Admin</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head><body>
<div id="online_users">
<div id="online_menu">Online Users:</div>
<div id="online_list"></div>

</div>
</div>

<div id="loginform">
		<p>Please wait: connecting to other players...</p> 
	</div>

<?php
?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

<?php
if(!isset($_POST['scenario']))
{
?>
// jQuery Document

$(document).ready(function(){	
	function loadUsers(){	 
		$.ajax({
			url: "php/get_online_users.php",
			cache: false,
			success: function(html){		
				$("#online_list").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
	}
	setInterval (loadUsers, 500);	//Reload file every 1 seconds
	
	function waitFor(){	 
		$.ajax({
			url: "php/WaitForFull.php",
			cache: false,
			success: function(html){		
				$("#loginform").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
	}
	
	// var foo="<?php echo $_SESSION['Start'];?>";
	 //if(foo != 'Start')
	setInterval (waitFor, 10000);
	});

<?php
}
?>

</script>
</body>
</html>