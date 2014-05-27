<?php
session_start();
include 'db_connect.php';

$get_users = mysql_query('SELECT * FROM usersonline ;');
if(mysql_num_rows ($get_users) != 16){
echo "<h4>Please wait: connecting of other players...</h4>";
}else{
echo'
	<div id="loginform">
	<form action="scenario.php" method="post">
		<h3>Please choose the scenario :</h3>
		<p>Time for chat (for 2,3 scenarios):</p>
		<input type="text" name="chat" maxlength="18" />
		 
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