<?php
session_start();
include 'db_connect.php';

$get_users = mysql_query('SELECT * FROM users WHERE room="'.$_SESSION['roomtype'].'"');
if(mysql_num_rows ($get_users) != 2){
echo "<h4>Please wait: connecting to other players...</h4>";
}else{
echo'
	<div id="loginform">
	<form action="scenario.php" method="post">
		<h3>Please choose the scenario :</h3>
		  <select name="scenario" id="scenario">
		   <option value="select">Scenario:</option>
    <option value="First">First</option>
    <option value="Second">Second</option>
	<option value="Third">Third</option>
  </select>
		<button name="submitmsg" id="submitmsg">Start</button>
	</form>
	</div>
	
';
}
//if(mysql_num_rows ($get_users) == 2) $_SESSION['Start'] = 'Start';

?>