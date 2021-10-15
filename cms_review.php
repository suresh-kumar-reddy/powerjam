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
	<?php include"admin_menubar.php";?>
		
			<div id="section" style="margin-left:10px;">
			
				<div class="content">
					<br><br><br><br>
						<h4 ><br><br><br><br><br><br>Modify Reviews about electricians</h4><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$target="review/";
							$target_file=$target.basename($_FILES["slide"]["name"]);
							if(move_uploaded_file($_FILES['slide']['tmp_name'],$target_file))
							{
								$sq="insert into review(slide_number,name,date,description,slide,AID) values('{$_POST["slide_number"]}','{$_POST["name"]}','{$_POST["date"]}','{$_POST["description"]}','{$target_file}','{$_SESSION["AID"]}')";
								
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
					<label>Review Number</label><br>
						<?php
							$no="S1";
							$sql="select * from review order by id desc limit 1";
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
					<label>Reviewer Name</label><br>
					<input type="text" class="input" name="name" required=""<br><br>
                                        <br>
					<label>Month,Year</label><br>
					<input type="text" class="input" name="date" required=""><br><br>
					<br>
					<label>Description</label><br>
					<input type="text" class="input" name="description" required=""><br><br>
					<label>Image</label><br>
					<center>
					<input type="file"  class="input" name="slide" required="">
			
			<br>
			<button style="text-align: center;" type="submit" style="float:left;" class="primary-button"" name="submit">Insert</button>
			</center>
				</div>
					
				</form>
				<center>
				<br><br>
					<h3 style="margin-top:30px;">Slide Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>Slide</th>
							<th>name</th>
							<th>date</th>
							
							<th>Description</th>
							<th>Want to Delete?</th>
						</tr>
						<?php
							$s="select * from review order by id desc";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								
								while($r=$res->fetch_assoc())
								{
										echo "
										<tr>
										<td><img src='{$r["slide"]}' height='40' width='40'></td>
					
										
										<td>{$r["name"]}</td>
										<td>{$r["date"]}</td>
										<td>{$r["description"]}</td>
	
	
										
											
										<td><a href='review_delete.php?id={$r["id"]}' class='btnr'>Yes!!</a></td>
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