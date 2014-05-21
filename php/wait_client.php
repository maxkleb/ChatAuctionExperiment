<?php
session_start();
include 'db_connect.php';
$name = $_GET['name'];
$scenario = mysql_query('SELECT scenario FROM admintable ;');
if(!$scenario){
echo "<h4>Please wait: connecting to other players...</h4>";
}else{
echo'
	<div id="loginform">
	<form action="add_user.php?scenario=$scenario&name=$name">
		<button name="submitmsg" id="submitmsg">Start</button>
	</form>
	</div>
	
';
}
//if(mysql_num_rows ($get_users) == 2) $_SESSION['Start'] = 'Start';

?>