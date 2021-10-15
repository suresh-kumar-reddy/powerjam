<?php
	session_start();
	if(!isset($_SESSION["MAIL"]))
	{
		echo"<script>window.open('ele_login.php?mes=Access Denied..','_self');</script>";
		
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
	<?php include "elogout.php";
	?>

		<br><br><br><br>					
					<center>
					<br><br><br>

				</center>
				</div>
								<h3 class="text">Welcome <br><br></h3>
                                                                <font><b>YOU HAVE ASSIGNED BY CUSTOMER<br><br>THE CUSTOMER DETAILS ARE<br>==========================</b></font>
                                          

				
		
<br><br><br>

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
							
						</tr>
						<?php
							$s="select RNO,NAME,LNAME,PHONE,MAIL,address,place from customer where amount!=0 AND ele_name='{$_SESSION["FNAME"]}'";
							
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
											
											
																

				                

										</tr>
									
									
									
									";
								}
							
							}
							else
							{
								echo "You havént assigned to any customer";
																?>
								<br><br>
								<?php

							}
												?>
	
</table>	

        <br><br>
		
		

<?php include "web_footer.php"?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
