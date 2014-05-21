<?php
$db = mysql_connect('localhost', 'root', ''); //This is your login credentials for your MySQL Server.
mysql_select_db('chatroom', $db); //If you use the SQL template included this will be default to 'chatroom'.
?>