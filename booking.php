<?php
	include "database.php";
		session_start();
	if(!isset($_SESSION["MAIL"]))
	{
		echo"<script>window.open('cust_login.php?mes=Access Denied..','_self');</script>";
		
	}	

?>
<?php
		include"database.php";
		$sql1="SELECT * FROM home_others WHERE id='1'";
		$res1=$db->query($sql1);

		if($res1->num_rows>0)
		{
			$row1=$res1->fetch_assoc();
		}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
	body {
 background-image: url("slides/bg3.jpg");
 background-color: black;
  background-size: cover;
 background-attachment: fixed;
}
</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/logo.jpg">
	
	<title>Power Jam</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

<body >
<?php 
if(isset($_SESSION["MAIL"]))
	{
include "clogout.php";
	}
	?>

		<br><br><br><br>
<html>
<body>
<form action="shop.php" method="POST">
<center><h2> <font color="black">Switches and Sockets
</h2></font></center><br>

<table style='color:black'; border=3 align="center"  background="./img/table.jpg">
<tr>
<th> AC switch Installation<br><img src='./img/switch1.jpg' height="60%" align="center"><br> Amount: 299<br>NO.OF : <input type="text" name="switch1" value="0">
</th>
<th>Switchboard Installation<br><img src='./img/switch2.jpg' height="30%"><br> Amount: 229<br>NO.OF : <input type="text" name="switch2"value="0">
</th>
<th>Switchboard Repair<br><img src='./img/switch3.jpg' height="30%"><br> Amount: 79<br>NO.OF : <input type="text" name="switch3" value="0">
</th>
<th>Switch / Socket Replacement<br><img src='./img/switch4.png' height="15%"><br> Amount: 49<br>NO.OF : <input type="text" name="switch4" value="0">
</th></font></tr></table>

<br><br>
 <center><h2> <font color="black">Fan
</h2></font></center>

<table style='color:black'; border=2 align="center" background="./img/table.jpg" cellspacing="30">
<tr>
<th>Ceiling Fan Regulator Replacement<br><img src='./img/fan1.jpg' height="70%"><br> Amount: 59<br>NO.OF : <input type="text" name="fan1" value="0">
</th>
<th>Decorative Ceiling Fan Installation<br><img src='./img/fan2.jpeg' height="55%"><br> Amount: 399<br>NO.OF : <input type="text" name="fan2" value="0">
</th>
<th>Fan Repair( Noise/ Speed)<br><img src='./img/fan3.jpg' height="9%"><br><br> Amount: 149<br>NO.OF : <input type="text" name="fan3" value="0">
</th>
<th><br>Fan(Installation/ Replacement)<br><img src='./img/fan4.png' height="25%"><br> Amount: 149<br>NO.OF : <input type="text" name="fan4"value="0">
</th></font>
</tr></table>

<br><br>
<center><h2> <font color="black">Light and Chandelier
</h2></font></center>
<br>
<table style='color:black'; border=2 align="center" background="./img/table.jpg">
<tr>
<th>Bulbs / Tubes Replacement<br><img src='./img/light1.jpg' height="18%"><br> Amount: 99<br>NO.OF : <input type="text" name="light1" value="0">
</th>
<th>Decorative wall / Ceiling Light<br><img src='./img/light2.jpg' height="20%"><br> Amount: 129<br>NO.OF : <input type="text" name="light2"value="0">
</th>
<th><br>Bed lamps<br><img src='./img/light3.jpg' height="13%"><br> Amount: 59<br>NO.OF : <input type="text" name="light3"value="0">
</th>
<th><br>Chandelier(Installation/ Replacement)<br><img src='./img/light4.jpg' height="8%"><br> Amount: 399<br>NO.OF : <input type="text" name="light4"value="0">
</th></font>
</tr></table>

<br><br>
 <center><h2> <font color="black">MCB & Fuse
</h2></font></center>
<br>
<table style='color:black'; border=2 align="center" background="./img/table.jpg">
<tr>
<th>3 Phase Changeover Switch Installation<br><img src='./img/fuse.jpg' height="50%"><br> Amount: 299<br>NO.OF : <input type="text" name="fuse" value="0">
</th>
<th>Fuse Replacement<br><img src='./img/fuse2.jpg' height="55%"><br> Amount: 79<br>NO.OF : <input type="text" name="fuse2" value="0">
</th>
<th>Single pole MCB Installation<br><img src='./img/fuse3.jpg' height="40%"><br> Amount: 89<br>NO.OF : <input type="text" name="fuse3" value="0">
</th>
</font>
</tr></table><br>
<center><input style='color:black'; type="submit" value="Continue"></center>
</form>
</body>
</html>