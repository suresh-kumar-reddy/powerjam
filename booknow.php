<?php
	session_start();
	if(!isset($_SESSION["MAIL"]))
	{
		echo"<script>window.open('cust_login.php?mes=Access Denied..','_self');</script>";
		
	}	
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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="icon" href="img/logo.png">
	
	<title>Power Jam</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

	<body background=".\img\bk.jpg">
	
<center>
	<?php include "clogout.php";
	?>

		<br><br><br><br>					
					<center>
					<br><br><br>

				</center>
				</div>
								<h3 class="text">Welcome <?php echo $_SESSION["NAME"]; ?></h3>
		
       		
				
			</div>
<br><br><br>
<button class="primary-button" ><a href="booking.php">Repairs & Fixes</a></button><br><br>
        <button class="primary-button" ><a href="booking.php">Electricity Brokedown</a></button><br><br>
	<button class="primary-button" ><a href="booking.php">Electrical Wining</a></button><br><br>
	<button class="primary-button" ><a href="booking.php">Installation Service</a></button>	</center>
        
<?php include "web_footer.php"?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
