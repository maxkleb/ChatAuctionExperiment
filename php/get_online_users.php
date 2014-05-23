<?php
session_start();
include 'db_connect.php';

$get_users = mysql_query('SELECT * FROM usersonline;');
while ($username = mysql_fetch_assoc($get_users))
{
$id = $username['ID'];
	echo "$id";
	echo "<br />";
}

?>