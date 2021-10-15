<?php
	include "database.php";
		session_start();
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
 background-image: url("img/background-2.jpg");
 background-color: black;
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


<?php include"menubar.php";?>

		<br><br><br><br>
		<div class="login" style="text-align: center;">
			<h3 class="heading" style="color: white;">Customer Login</h3>
			<div class="log"  >
			<?php
				if(isset($_POST["login"]))
				{
					$sql="select * from customer where MAIL='{$_POST["mail"]}' and PASSWORD='{$_POST["password"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["MAIL"]=$ro["MAIL"];
						$_SESSION["NAME"]=$ro["NAME"];		
						echo "<script>window.open('coperations.php','_self');</script>";
					}
					else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
				
			?>

				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label style="color: white;">user mail</label><br>
					<input type="text" name="mail" required class="input"><br><br>
					<label style="color: white;">Password </label><br>
					<input type="password" name="password" required class="input"><br>
					<br>
					<a href="forgotpassword.php" > Forgot password?</a>
                                        <br>
                                        <a href="cust_signup.php" > SIGNUP</a>
					
					<button type="submit" class="primary-button" name="login">Login Here</button>
					<br>
					<br>
				</form>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
			<!-- FOOTER -->
	<?php include"web_footer.php";?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
	
		
	</body>
</html>