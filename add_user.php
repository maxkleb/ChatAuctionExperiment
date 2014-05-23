<?php
session_start();
include 'php/db_connect.php';

$room = $_SESSION['name']/4;
$name = $_SESSION['name'];


//$_SESSION['scenario'] = $scenario;
//print"$scenario $room $name";
$query = "INSERT INTO users (username, room) VALUES ('$name' , '$room') ;";
mysql_query($query);

if(!isset($_SESSION['scenario'])){
header('Location: NoScenario.php'); exit();}

switch ($_SESSION['scenario']) {
    case '1':{
        header('Location: user_scenario_1.php');
		exit();
		}
        break;
    case '2':
       {
	   header('Location: user_scenario_2.php');
		exit();
	   }
        break;
    case '3':{
        header('Location: user_scenario_3.php');
		exit();}
        break;
}

//if(mysql_num_rows ($get_users) == 2) $_SESSION['Start'] = 'Start';

?>