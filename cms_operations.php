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
 background-color: white;

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

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />P
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

<body style="text-align: center;">
	<?php include"admin_menubar.php";?>

					<div class="content">
					<br><br><br><br><br>
					<h4>Add or Remove Programmes</h4><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$target="programme pics/";
							$target_file=$target.basename($_FILES["slide"]["name"]);
							if(move_uploaded_file($_FILES['slide']['tmp_name'],$target_file))
							{
								$sq="insert into programmes(programme_number,programme_name,price,description,programme_link,slide,AID) values ('{$_POST["programme_number"]}','{$_POST["programme_name"]}','{$_POST["price"]}','{$_POST["description"]}','{$_POST["programme_link"]}','{$target_file}','{$_SESSION["AID"]}')";
								
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
					<label>Programme Number</label><br>
						<?php
							$no="P1";
							$sql="select * from programmes order by id desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["programme_number"],1,strlen($row1["programme_number"]));
								$no++;
								$no="P".$no;
							}
						
						
						
						?>
					<input type="text" class="input" name="programme_number" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label>Programme Name</label><br>
					<input type="text" class="input" name="programme_name" required=""><br><br>
					<label>Price</label><br>
					<input type="text" class="input" name="price" required=""><br><br>
					
					<label>Description</label><br>
					<input type="text" class="input" name="description" required=""><br><br>
					<label>Programme Link</label><br>
					<input type="text" class="input" name="programme_link" required=""><br><br>
					
					<label>Image</label><br>
					<center>
					<input type="file"  class="input" name="slide" required="">
					</center>
			
			<button style="text-align: center;" type="submit" class="primary-button" name="submit">Insert</button>
				</div>
					
				</form>
				<div class="lbox">
				<br>
					<h5 style="margin-top:30px;"><a href="preview_programmes.php">Programme Details</a></h5><br>
						<div class="content1">
					
						<h4 > Enter Programme name</h4><br>
						<form id="frm" autocomplete="off">
							<input type="text" id="txt" class="input" pattern="[a-zA-Z]{3,}" title="Enter only Alphabets">
						</form>
						<br>
						<div id="box"></div>
						
					</div>
				</div>
				</div>
				
				
			</div>
			
	</body>
</html>
			<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>

		