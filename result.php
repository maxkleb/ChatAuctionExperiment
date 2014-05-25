<html>
<body>
<div id="loginform">

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

echo "<center><h4>Results:</h4></center>";
//Print results
print"----------------Room #1--------------------------</br>";
$query = "SELECT * FROM bidtable WHERE room = '$r0';";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    print "<tr><td>ID: ".$row['id']."  </td><td>Room: ".$row['room']."  </td><td>Bid: ".$row['bet']."  </td><td>Before: ".$row['beforebid']."  </td><td>Aftet: ".$row['afterbid'].  "</td></tr></br>";
}
print"</br>----------------Room #2--------------------------</br>";
$query = "SELECT * FROM bidtable WHERE room = '$r1';";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    print "<tr><td>ID: ".$row['id']."  </td><td>Room: ".$row['room']."  </td><td>Bid: ".$row['bet']."  </td><td>Before: ".$row['beforebid']."  </td><td>Aftet: ".$row['afterbid'].  "</td></tr></br>";
}
print"</br>----------------Room #3--------------------------</br>";
$query = "SELECT * FROM bidtable WHERE room = '$r2';";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    print "<tr><td>ID: ".$row['id']."  </td><td>Room: ".$row['room']."  </td><td>Bid: ".$row['bet']."  </td><td>Before: ".$row['beforebid']."  </td><td>Aftet: ".$row['afterbid'].  "</td></tr></br>";
}

print"</br>----------------Room #4--------------------------</br>";
$query = "SELECT * FROM bidtable WHERE room = '$r3';";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    print "<tr><td>ID: ".$row['id']."  </td><td>Room: ".$row['room']."  </td><td>Bid: ".$row['bet']."  </td><td>Before: ".$row['beforebid']."  </td><td>Aftet: ".$row['afterbid'].  "</td></tr></br>";
}
print"</br>---------------------------------------------------</br>";
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
	<a href = "clear_all.php">
		<button name="submitmsg" id="submitmsg">Try Again</button>
	</a>
	</div>
</body>
</html>