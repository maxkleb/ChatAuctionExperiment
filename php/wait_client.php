<?php
session_start();
include 'db_connect.php';
$name = $_SESSION['name'];
$query = 'SELECT scenarioid FROM admintable ;';
$scenario = null;
$result = mysql_query($query);
if(mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
$scenario = $row['scenarioid'];}


if($scenario == null){
echo "<h4>Please wait: connecting of other players...</h4>";
}else{
$_SESSION['scenario'] = $scenario;
echo'
	<div id="loginform">
	<a href = "add_user.php?scenario=$scenario&name=$name">
		<button name="submitmsg" id="submitmsg">Start</button>
	</a>
	</div>
';
}
//if(mysql_num_rows ($get_users) == 2) $_SESSION['Start'] = 'Start';

?>