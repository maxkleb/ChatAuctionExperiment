
<?php
session_start();
include ('php/db_connect.php');

if(!isset($_POST['scenario']))
{
header('Location: admin.php');
exit();
}

$tmp = $_POST['scenario'];
if($tmp == 'First') $tmp =1;
if($tmp =='Second') $tmp =2;
if($tmp == 'Third') $tmp =3;
$query ="INSERT INTO admintable (scenarioid) VALUES ('$tmp');";
mysql_query($query);

if($tmp == '1') {
header('Location: scenario_1.php?scenario=$tmp');
exit();
}
if($tmp == '2'){
header('Location: scenario_2.php?scenario=$tmp');
exit();
}
if($tmp == '3'){
header('Location: scenario_3.php?scenario=$tmp');
exit();
}


?>