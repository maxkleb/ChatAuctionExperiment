<?php
session_start();
include 'db_connect.php';

$get_row = mysql_query("SELECT * FROM `private_chats` WHERE CONDITION HERE ORDER BY `private_message_no` DESC LIMIT 0,1");
$get_message = mysql_fetch_assoc($get_row);
echo $get_message['message'];
?>