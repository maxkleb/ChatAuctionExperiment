<?php
session_start();
include 'db_connect.php';

$get_users = mysql_query('SELECT * FROM users WHERE room="'.$_SESSION['roomtype'].'"');
while ($username = mysql_fetch_assoc($get_users))
{
	echo "<font color="red"><a href='private.php?u=".$username['username']."'></font>".$username['username']."</a>";
	echo "<br />";
}

?>