<?php 
session_start();
include ('php/db_connect.php');

$r0 = 0;
$r1 = 1;
$r2 = 2;
$r3 = 3;

$s = 0;
//Calculate sum of 0 room
$query = "SELECT * FROM bidtable WHERE room='$r0'";
$result = mysql_query('SELECT * FROM bidtable');
while($row = mysql_fetch_array($result)){
$s += $row['bet'];
}
$s/=4;

$query = "UPDATE bidtable SET afterbid = afterbid+'$s' WHERE room = '$r0';";
mysql_query($query);
$s = 0;

//Calculate sum of 1 room
$query = "SELECT * FROM bidtable WHERE room='$r1'";
$result = mysql_query('SELECT * FROM bidtable');
while($row = mysql_fetch_array($result)){
$s += $row['bet'];
}
$s/=4;
$query = "UPDATE bidtable SET afterbid = afterbid+'$s' WHERE room = '$r1';";
mysql_query($query);
$s = 0;

//Calculate sum of 2 room
$query = "SELECT * FROM bidtable WHERE room='$r2'";
$result = mysql_query('SELECT * FROM bidtable');
while($row = mysql_fetch_array($result)){
$s += $row['bet'];
}
$s/=4;
$query = "UPDATE bidtable SET afterbid = afterbid+'$s' WHERE room = '$r2';";
mysql_query($query);
$s = 0;

//Calculate sum of 3 room
$query = "SELECT * FROM bidtable WHERE room='$r3'";
$result = mysql_query('SELECT * FROM bidtable');
while($row = mysql_fetch_array($result)){
$s += $row['bet'];
}
$s/=4;
$query = "UPDATE bidtable SET afterbid = afterbid+'$s' WHERE room = '$r3';";
mysql_query($query);


//Print results
$query = "SELECT * FROM bidtable WHERE room = '$r0';";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    print "<tr><td>ID: ".$row['id']."  </td><td>Room: ".$row['room']."  </td><td>Bid: ".$row['bet']."  </td><td>Before: ".$row['beforebid']."  </td><td>Aftet: ".$row['afterbid'].  "</td></tr></br>";
}


/*
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
*/
?>