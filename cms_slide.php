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
		<style>
	body {
 background-image: url("slides/pj.jpg");
 background-color: black;
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

<body style="color: black;">
	<?php include "admin_menubar.php"; ?>
			<div id="section" style="text-align: center;">
				
			
				
								<div class="content">
				<br>	
				<br>
				<br>
				<br>
				<br>
						<h4 style="color: white;"><br><br><br><br><br><br>Modify Slides</h4><br>
					<?php
						if(isset($_POST["submit"]))
						{
						 			$target="slides/";
							$target_file=$target.basename($_FILES["slide"]["name"]);
						
						if(move_uploaded_file($_FILES['slide']['tmp_name'],$target_file))
							{
								$sq="insert into slides(slide_number,heading,description,page_link,slide,AID) values('{$_POST["slide_number"]}','{$_POST["heading"]}','{$_POST["description"]}','{$_POST["page_link"]}','{$target_file}','{$_SESSION["AID"]}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed</div>";
								}
							}
					

					
						}
					
					
					
					
					?>
			
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label style="color: black;">Slide Number</label><br>
						<?php
							$no="S1";
							$sql="select * from slides order by id desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["slide_number"],1,strlen($row1["slide_number"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input" name="slide_number" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label style="color: black;">Slide Heading</label><br>
					<input type="text" class="input" name="heading"><br><br>
					<label style="color: black;">Slide Description</label><br>
					<input type="text" class="input" name="description"><br><br>
					<label style="color: black;">Slide Link</label><br>
					
					<input type="text" class="input" name="page_link"><br><br>				
					<label style="color: black;">Slide Image</label><br>
					<center>
					<input type="file"  class="input" name="slide" required="">
					</center>
			
				<br>	<button style="text-align: center;"  type="submit" style="float:left;" class="primary-button" name="submit">Insert</button><br>
				</div>
					
				</form>
				
				
				<br><a style="color:white;" href="preview_slides.php" style="margin-top:30px;">&nbsp;&nbsp;&nbsp;&nbsp;Preview</a>
					<br>
					<br>
					</div>

				
				
			</div>
	
				
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
	</body>
</html>