<?php
session_start();
include 'db_connect.php';
//echo $_SESSION['roomtype'];
$get_row = mysql_query("SELECT * FROM `".$_SESSION['roomtype']."` ORDER BY `message_no` DESC LIMIT 0,1");
$get_message = mysql_fetch_assoc($get_row);
echo $get_message['message'];
//echo $_SESSION['test'];
?>