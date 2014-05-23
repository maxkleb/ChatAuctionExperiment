<?php
session_start();
include 'db_connect.php';
$room = $_SESSION['t'];
$query = "SELECT * FROM users WHERE room='$room";
$get_users = mysql_query($query);
if($get_users){
echo "Empty...";
}
while ($username = mysql_fetch_assoc($get_users))
{
	echo "<a href='private.php?u=".$username['username']."'>".$username['username']."</a>";
	echo "<br />";
}

?>