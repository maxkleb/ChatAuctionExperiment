<?php
session_start();
include 'db_connect.php';
$query = "select COUNT(id) from bidtable;";
$get = mysql_query($query);
$result = mysql_fetch_assoc($get);
if($result['COUNT(id)']!=0)
{
echo '
		<p>Thank you for participation!!!</p>			
';
}
else{
echo '<div id="loginform">
	<a href = "index.php">
		<button name="submitmsg" id="submitmsg">return</button>
	</a>
	</div>';
}
?>