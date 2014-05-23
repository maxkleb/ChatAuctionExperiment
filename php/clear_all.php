<?php
session_start();
include 'db_connect.php';
$query = "DELETE FROM bidtable";
mysql_query($query);

$query = "DELETE FROM admintable";
mysql_query($query);

$query = "DELETE FROM users";
mysql_query($query);

$query = "DELETE FROM usersonline";
mysql_query($query);

?>