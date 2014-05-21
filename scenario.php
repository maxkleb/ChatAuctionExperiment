
<?php
session_start();
include ('php/db_connect.php');

if(!isset($_POST['scenario']))
{
header('Location: admin.php');
exit();
}
$tmp = $_POST['scenario'];

if($_POST['scenario'] == 'First') {
header('Location: scenario_1.php?scenario=$tmp');
exit();
}
if($_POST['scenario'] == 'Second'){
header('Location: scenario_2.php?scenario=$tmp');
exit();
}
if($_POST['scenario'] == 'Third'){
header('Location: scenario_3.php?scenario=$tmp');
exit();
}


?>