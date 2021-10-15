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

				         <br><br><br><br><br><br>
					<H2><br><br>ASSIGN ELECTRICIANS TO CUSTOMERS</H2>
				
				<div class="content">
				<br>
					<?php
						if(isset($_POST["submit"]))
						{	
							$sq="insert into booking(ele_name,cust_name) values ('{$_POST["ele_name"]}','{$_POST["cust_name"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
								$temp="yes";
								$sq2="update customer set assignedwork='$temp',ele_name='{$_POST["ele_name"]}',workingprogress='$temp' where NAME='{$_POST["cust_name"]}'";
								$db->query($sq2);
								$sq1="update electrician set ASSIGNEDWORK='$temp' where FNAME='{$_POST["ele_name"]}'";
								$db->query($sq1);
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
						}
					?>
			
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

					<label>Customer</label>
					<select name="cust_name" required class="input3">
						<?php
							$sl="select NAME from customer where workingprogress='yes'";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Select</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["NAME"]}'>{$ro["NAME"]}</option>";
								}
								
							}	
						?>	
						
					</select>
					
					<label>Electrician</label>
					<select name="ele_name" required class="input3">
						<?php
							$sl="select FNAME from electrician where ASSIGNEDWORK='no'";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Select</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["FNAME"]}'>{$ro["FNAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
					
					<br><br>
					</div>
					<button type="submit" class="btn" name="submit">Assign Work</button>
				</form>
				
				
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