<?php
session_start();
include 'db_connect.php';
$room = 0;
$query = "SELECT * FROM bidtable WHERE room='$room';";
$get_users = mysql_query($query);
if(!$get_users){
echo "Empty...";
}
else{
while ($username = mysql_fetch_assoc($get_users))
{
	$id = $username['id'];
	$bet =  $username['bet'];
	echo "ID $id: $bet";
	echo "<br />";
}}

?>