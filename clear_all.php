<?php
session_start();
include 'php/db_connect.php';
$query = "DELETE FROM bidtable";
mysql_query($query);

$query = "DELETE FROM admintable";
mysql_query($query);

$query = "DELETE FROM users";
mysql_query($query);

$query = "DELETE FROM general";
mysql_query($query);


header('Location: admin.php');
exit();
?>