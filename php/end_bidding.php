<?php
session_start();
include 'db_connect.php';

$get_users = mysql_query('SELECT * FROM bettable');
$count = mysql_num_rows (get_users);
?>