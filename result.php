<?php 
session_start();
include ('php/db_connect.php');


if(isset( $_GET['scenario'])){
	$tmp = $_GET['scenario'];
}
else {
header('Location: admin.php');
exit();
}

$get_users = mysql_query('SELECT * FROM bettable');
$count = mysql_num_rows (get_users);

if($count<2){
switch ($tmp) {
    case 'First':{
        header('Location: scenario_1.php');
		exit();
		}
        break;
    case 'Second':
       {
	   header('Location: scenario_2.php');
		exit();
	   }
        break;
    case 'Third':{
        header('Location: scenario_3.php');
		exit();}
        break;
}}

//Print results


switch ($tmp) {
    case 'First':{
       //1
		}
        break;
    case 'Second':
       {
	  //2
	   }
        break;
    case 'Third':
       {
	   //3
	   }
        break;
}

?>