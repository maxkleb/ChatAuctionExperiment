<?php
session_start();
include 'db_connect.php';
$name = $_GET['name'];
$scenario = $_GET['scenario'];
$room = $name%4;
mysql_query('INSERT INTO users (username, room) VALUES ('$name','$room') ;');

switch ($scenario) {
    case 'First':{
        header('Location: user_scenario_1.php');
		exit();
		}
        break;
    case 'Second':
       {
	   header('Location: user_scenario_2.php');
		exit();
	   }
        break;
    case 'Third':{
        header('Location: user_scenario_3.php');
		exit();}
        break;
}

//if(mysql_num_rows ($get_users) == 2) $_SESSION['Start'] = 'Start';

?>