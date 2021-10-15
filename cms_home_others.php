<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>
<?php
	$sql="SELECT * FROM home_others WHERE id='1'";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        	<style>
	body {
 background-image: url("slides/pj.jpg");
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
	
	<title>POWER JAM</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

<body style="text-align: center;">
	<?php include"admin_menubar.php";?>
		<?php include"navbar.php";?>
	
			<div id="section" style="margin-left:10px;">
				
				<div class="content">
				
					<h4><br><br><br><br><br><br>Manipulate</h4><br>
					<div class="lbox1">

							
					<?php
						if(isset($_POST["submit"]))
						{	
							$sql="update home_others set e_name='{$_POST["e_name"]}',e_heading='{$_POST["e_heading"]}',e_description='{$_POST["e_description"]}',latest_event_link='{$_POST["latest_event_link"]}',important_requirement='{$_POST["important_requirement"]}',requirement_link='{$_POST["requirement_link"]}',customers='{$_POST["customers"]}',electricians='{$_POST["electricians"]}',phone1='{$_POST["phone1"]}',phone2='{$_POST["phone2"]}',paytm='{$_POST["paytm"]}',googlepay='{$_POST["googlepay"]}'  where id='1'";
							$target="programme pics/";
							$target_file=$target.basename($_FILES["slide"]["name"]);
							if(move_uploaded_file($_FILES['slide']['tmp_name'],$target_file))
							{
							
								$sq="update home_others set slide='{$target_file}'";
											$db->query($sq);
											echo "<div class='success'>Inserted Successfully</div>";				
							}
								$db->query($sql);
											echo "<div class='success'>Updated Successfully</div>";
										}
								
					?>	
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						 <label>Name for the Latest Event</label>         		<br>
			
					     <input type="text" name="e_name" required class="input" value="<?php echo $row["e_name"] ?>">
					     <br><br>
						 
						 <label>Heading for the Latest Event</label><br>
				              <input type="text" name="e_heading" required class="input" value="<?php echo $row["e_heading"] ?>">
					     <br><br>
						   <label>Description for the Latest Event</label>
						   <br>
					     <input type="message" name="e_description" required class="input" value="<?php echo $row["e_description"] ?>">
					     <br><br>
					     
                                             <label>Latest Event Link</label>
						   <br>
					     <input type="text" name="latest_event_link" required class="input" value="<?php echo $row["latest_event_link"] ?>">
					     <br><br>

						  <label>Important Requirement</label>
						   <br>
						   
					     <input type="text" name="important_requirement" required class="input" value="<?php echo $row["important_requirement"] ?>">
					     <br><br>

					     <label>Link for Important Requirement</label>
						   <br>
					     <input type="text" name="requirement_link" required class="input" value="<?php echo $row["requirement_link"] ?>">
					     <br><br>
					    						
					    <label>Number of Customers</label><br>
					    <input type="text" name="customers" required class="input" value="<?php echo $row["customers"] ?>">
					     
						<br><br>
						<label>Number of Professional Electricians</label><br>
					    <input type="text" name="electricians" required class="input" value="<?php echo $row["electricians"] ?>">

						<br><br>
						<label>Landline Number</label><br>
					    <input type="text" name="phone1" required class="input" value="<?php echo $row["phone1"] ?>">

						<br><br>
						<label>Contact Number</label><br>
					    <input type="text" name="phone2" required class="input" value="<?php echo $row["phone2"] ?>">
					    <br>
						<br>

						<label>Paytm Number</label><br>
					    <input type="text" name="paytm" required class="input" value="<?php echo $row["paytm"] ?>">
					    <br>
						<br>

						<label>Google Pay Number</label><br>
					    <input type="text" name="googlepay" required class="input" value="<?php echo $row["googlepay"] ?>">
					    <br>
						<br>

					<label>Image</label><br>
					<center>
					<input type="file"  class="input" name="slide">
					</center>
	
						
						<button style="text-align: center;" type="submit" style="float:left;" class="primary-button" name="submit">Update</button><br>
						</form>
					</div>

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