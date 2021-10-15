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
		<br><br><br><br>	
					<h4 ><br><br><br><br><br><br>Add Gallery</h4><br>
					<?php
						if(isset($_POST["submit"]))
						{
								
								
					$errors = array();
		
		$extension = array("jpeg","jpg","png","gif");
		
		$bytes = 1024;
		$allowedKB = 1000000;
		$totalBytes = $allowedKB * $bytes;
		
		if(isset($_FILES["files"])==false)
		{
			echo "<b>Please, Select the files to upload!!!</b>";
			return;
		}
		
		$conn = mysqli_connect("localhost","root","","powerjam");	
		
		foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
		{
			$uploadThisFile = true;
			
			$file_name=$_FILES["files"]["name"][$key];
			$file_tmp=$_FILES["files"]["tmp_name"][$key];
			
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);

			if(!in_array(strtolower($ext),$extension))
			{
				array_push($errors, "File type is invalid. Name:- ".$file_name);
				$uploadThisFile = false;
			}				
			
			if($_FILES["files"]["size"][$key] > $totalBytes){
				array_push($errors, "File size must be less than 10000KB. Name:- ".$file_name);
				$uploadThisFile = false;
			}
			if($uploadThisFile)
			{
				$filename=basename($file_name,$ext);
				$newFileName=$filename.$ext;				
				move_uploaded_file($_FILES["files"]["tmp_name"][$key],"Upload/".$newFileName);
				
				$sq="insert into gallery(gallery_number,gallery_name,gallery_date,gallery_by,description,FilePath,FileName,AID) values ('{$_POST["gallery_number"]}','{$_POST["gallery_name"]}','{$_POST["gallery_date"]}','{$_POST["gallery_by"]}','{$_POST["description"]}','Upload','".$newFileName."','{$_SESSION["AID"]}')";
					
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
		
		mysqli_close($conn);
		
		$count = count($errors);
		
		if($count != 0){
			foreach($errors as $error){
				echo $error."<br/>";
			}
		}

					
						
					
					
							}
					
					
					?>
			
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label style="color:black;">Gallery number</label><br>
						<?php
							$no="S1";
							$sql="select * from gallery order by id desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["gallery_number"],1,strlen($row1["gallery_number"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input" name="gallery_number" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label style="color:black;">Event Name</label><br>
					<input type="text" class="input" name="gallery_name" required=""><br><br>
					<label style="color:black;">Event Date</label><br><br>
					<input type="date" id="dt" name ="gallery_date" onchange="mydate1();" hidden/>
					<input type="text" id="ndt" name ="gallery_date" onclick="mydate();" hidden />
					<input type="button" Value="Click here" name ="gallery_date" onclick="mydate();" />
					<br>
					<br>
					<label style="color:black;">Posted by</label><br>
					<input type="text" class="input" name="gallery_by" required=""><br><br>
					
					<label style="color:black;">Description</label><br>
					<input type="text" class="input" name="description" required=""><br><br>
					
										
					<center>
						<label for="exampleInputFile" style="color:black;">Select files to upload:</label>
					
								<br><br>
						<input type="file" id="exampleInputFile" name="files[]" multiple="multiple" required="">
					

					<br><br>
					<button type="submit" style="text-align: center;" class="primary-button" name="submit">Insert</button>
			</center>
				</div>
		</form>
		<div class="lbox">
				
					<label "style="margin-top:55px;"><a href="preview_gallery.php">Preview Gallery</a></label>
		</div>		
				
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/js/jQuery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/js/bootstrap.min.js"></script>
		
		<script src="js/js/jQuery.Form.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){			
				
				var divProgressBar=$("#divProgressBar");
				var status=$("#status");
				
				$("#uploadForm").ajaxForm({
					
					dataType:"json",
					
					beforeSend:function(){
						divProgressBar.css({});
						divProgressBar.width(0);
					},
					
					uploadProgress:function(event, position, total, percentComplete){
						var pVel=percentComplete+"%";
						divProgressBar.width(pVel);
					},
					
					complete:function(data){
						status.html(data.responseText);
					}
				});
			});
		</script>
		</div>
				
				
			</div>	
		
		<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
				<?php include"footer.php";?>
	
	</body>
</html>
<script>
function mydate()
{
  //alert("");
document.getElementById("dt").hidden=false;
document.getElementById("ndt").hidden=true;
}
function mydate1()
{
 d=new Date(document.getElementById("dt").value);
dt=d.getDate();
mn=d.getMonth();
mn++;
yy=d.getFullYear();
document.getElementById("ndt").value=dt+"-"+mn+"-"+yy
document.getElementById("ndt").hidden=false;
document.getElementById("dt").hidden=true;
}
</script>