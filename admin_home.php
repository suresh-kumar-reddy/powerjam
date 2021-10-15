<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="icon" href="./img/logo.png">
	
	<title>POWER JAM</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

<body style="text-align: center;" background="./img/bk.jpg">
	<?php include"admin_menubar.php";
	?>

		<br><br><br><br>					
					<center>
					<br><br><br>
										<h2 style="color:green">Welcome <?php echo $_SESSION["ANAME"]; ?></h2>

						<h3 >Messages received</h3><br>
					
					
					<table border="3px" cellspacing="10" >
						<tr>
							<th>S.No</th>
							<th>ID No</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Mail</th>
							<th>Subject</th>
					
							<th>Message</th>
							<th>Wanna Reply?</th>

							<th>Wanna Delete?</th>
						</tr>
						<?php
							$s="select * from contact order by id desc";
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
											<td>{$r["id"]}</td>
											<td>{$r["name"]}</td>
											<td>{$r["phone"]}</td>
											<td>{$r["email"]}</td>
											<td>{$r["subject"]}</td>
											<td>{$r["message"]}</td>
												<td><a href='mailto:{$r["email"]}'    class='btnr'>Click</a></td>

											
										<td><a href='message_delete.php?id={$r["id"]}' class='btnr'>Yes</a></td>
	
											
										</tr>
									
									
									
									";
								}
							}
							else
							{
								echo "No Record Found";
							}
						
						?>
						
					</table>
				</center>
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
				<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
	</body>
</html>
<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search_customer.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>