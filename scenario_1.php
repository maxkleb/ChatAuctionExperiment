
<?php
session_start();
include ('php/db_connect.php');
/*
$_SESSION['roomtype'] = "General";
isset($_SESSION['scenario']);
$_SESSION['scenario'] = '';
isset($_SESSION['Start']);
$_SESSION['Start'] = '';
isset($_SESSION['Group']);
$_SESSION['Group'] = '';
*/
if(!isset($_GET['scenario']))
{
header('Location: admin.php');
exit();
}
$tmp = $_GET['scenario'];
$_SESSION['name'] = 'Admin';
if ( ! isset ( $_SESSION['t'] ) ) 
    { 
        $_SESSION['t'] = 0; 
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
<div id="cont">
<div id="menu">
			<p class="welcome">Welcome <b><?php echo $_SESSION['name']; ?></b></p>
			<p class="logout"><a href="result.php?scenario=<?php echo $tmp?>">Done</a></p>
			<div style="clear:both"></div>
			
		</div>
<div id="m1" style="height:50px;width:700px;float:left;"><h2>BIDDING:</h2></div>
<div id="m1" style="height:15px;width:30px;float:left;"><b></b></div>
<div id="m1" style="height:15px;width:130px;float:left;"><b>Room #1</b></div>
<div id="m1" style="height:15px;width:160px;float:left;"><b>Room #2</b></div>
<div id="m1" style="height:15px;width:190px;float:left;"><b>Room #3</b></div>
<div id="m1" style="height:15px;width:80px;float:left;"><b>Room #4</b></div>
<div id="m1" style="height:30px;width:700px;float:left;"></div>
<div id="menu">	
<div id="Scenario1"></div>
<div id="Scenario2"></div>
<div id="Scenario3"></div>
<div id="Scenario4"></div>
<?php$_SESSION['t'] = 0;print'$_SESSION['t'];'?>
</div>

</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

// jQuery Document
var coun = 0;
$(document).ready(function(){	
	function first_1(){	 
		$.ajax({
			url: "php/first1.php",
			cache: false,
			success: function(html){		
				$("#Scenario1").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
		}
	setInterval (first_1, 500);
	function first_2(){	 
		$.ajax({
			url: "php/first2.php",
			cache: false,
			success: function(html){		
				$("#Scenario2").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
		}
		
		setInterval (first_2, 500);
		function first_3(){	 
		$.ajax({
			url: "php/first3.php",
			cache: false,
			success: function(html){		
				$("#Scenario3").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
		}
		setInterval (first_3, 500);
		function first_4(){	 
		$.ajax({
			url: "php/first4.php",
			cache: false,
			success: function(html){		
				$("#Scenario4").html(html); //Insert chat log into the #chatbox div						
		  	},
		});
	}
		setInterval (first_4, 500);
	$("#exit").click(function(){
		window.location = 'index.php';
	});
	
	});
	



</script>
</body>
</html>