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
<style>
	body {
 background-image: url("./img/bk.jpg");
 background-color: white;
  background-size: cover;
 background-attachment: fixed;

}
</style>
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

	<body style="text-align: center;">
	
<center>
	<?php include "clogout.php";
	?>

		<br><br><br><br>					
					<center>
					<br><br><br>

				</center>
				</div>
								<h3 class="text">Welcome <?php echo $_SESSION["NAME"]; ?><br><br></h3>
		
       			<table border="3px" >
						<tr>
							<th>Sl. No</th>
							<th>ID No</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone Number</th>
							<th>Mail</th>
							
							
							<th>Address</th>
							
							<th>Place</th>
							<th>Amount to be Paid</th>
							<th>Work in Progres?</th>
							<th> Click below if work is done</th>
						</tr>
						<?php
							$s="select * from customer where MAIL='{$_SESSION["MAIL"]}'";
							
							$res=$db->query($s);

							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
										
									$i++;
									echo"
										<tr>
											<td>{$i}</td>
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["LNAME"]}</td>
											<td>{$r["PHONE"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["address"]}</td>
											<td>{$r["place"]}</td>
											<td>{$r["amount"]}</td>
											<td>{$r["workingprogress"]}</td>
																

															<td><a href='work_delete.php?ID={$r["ID"]}' class='btng'>Work is Done?</a><td>

										</tr>
									
									
									
									";
								}
							
							}
					$sql="select ele_name from customer where  MAIL='{$_SESSION["MAIL"]}' ";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["ele_name"]=$ro["ele_name"];
					}
													?>
	
</table>	
				
			</div>
			<br>
											<button class="primary-button" ><a href="booknow.php">Wanna Book?</a></button><br><br>

<br><br><br>


        <br><br>
		
		<h3><?php
							$s11="select FNAME,PHONE from electrician where FNAME=(select ele_name from customer where MAIL='{$_SESSION["MAIL"]}' AND ASSIGNEDWORK='yes')";
							$res4=$db->query($s11);
					

							if($res4->num_rows>0)
							{
								$i=0;
								while($r4=$res4->fetch_assoc())
								{
									$i++;
			
									echo "YOU HAVE BOOKED AN ELETRICIAN";?>
									<br><hr>
									<?php
									echo " THE ELETRICIAN DETAILS ARE";?>
									<br>
									<?php
									echo "==========================";?>
									<br>
									<br></h3>
									<p><b>
									<?php
									echo "The Name of Electrician is:  {$r4["FNAME"]}"; ?>
									<br>
									<?php
									echo "The phone is:  {$r4["PHONE"]}";
										
									
									
									
								
								}
							}

	?></p></b></h3>
<?php include "web_footer.php"?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
