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
			<div style="text-align: center;color: black;">
			
			<br><br>
	
					<br><br>
					<h4 ><br><br><br><br><br><br>Modify Events</h4><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$target="upcoming events/";
							$target_file=$target.basename($_FILES["slide"]["name"]);
							if(move_uploaded_file($_FILES['slide']['tmp_name'],$target_file))
							{
								$sq="insert into c_events(event_number,event_name,event_date,event_by,description,event_link,slide,AID) values ('{$_POST["event_number"]}','{$_POST["event_name"]}','{$_POST["event_date"]}','{$_POST["event_by"]}','{$_POST["description"]}','{$_POST["event_link"]}','{$target_file}','{$_SESSION["AID"]}')";
								
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
					<label style="color:black;">Slide Number</label><br>
						<?php
							$no="S1";
							$sql="select * from c_events order by id desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["event_number"],1,strlen($row1["event_number"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input" name="event_number" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label style="color:black;">Event Name</label><br>
					<input type="text" class="input" name="event_name" required=""><br><br>
					<label style="color:black;">Event Date</label><br><br>
					<input type="date" id="dt" name ="event_date" onchange="mydate1();" hidden/>
					<input type="text" id="ndt" name ="event_date" onclick="mydate();" hidden />
					<input type="button" Value="Click here" style="text-align: center;" name ="event_date" onclick="mydate();" />
					<br>
					<br>
					<br>
					<label style="color:black;">Posted by</label><br>
					<input type="text" class="input" name="event_by" required=""><br><br>
					<label style="color:black;">Description</label><br>
					<input type="text" class="input" name="description" required=""><br><br>
					<label>Event Link</label><br>
					<input type="text" class="input" name="event_link" required=""><br><br>
					
					<label style="color:black;">Image</label><br>
					<center>
					<input type="file"  class="input" name="slide" required="">
			</center><br>
			
			<button style="text-align: center;" type="submit" class="btn" name="submit">Insert</button> <br>
			
				</div>
					
				</form>
				<div class="lbox">
				<br>
					<h5 style="margin-top:30px;"> <a href="preview_c_events.php">Preview</h5></a>
					<br>
					<br>
							<div class="content1">
					
						<h4> Enter Event name to search</h4><br>
						<form id="frm" autocomplete="off">
							<input type="text" id="txt" class="input" pattern="[a-zA-Z]{3,}" title="Enter only Alphabets">
						</form>
						<br>
						<div id="box"></div>
						
					</div>
				</div>
				
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

<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search_c_events.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>