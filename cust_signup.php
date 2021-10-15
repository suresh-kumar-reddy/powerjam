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
      $row2=$res1->fetch_assoc();
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
  body {
 background-image: url("slides/background-2.jpg");
 background-color: #cccccc;
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

<body>
<?php
		include"menubar.php";
	 ?>



    <br><br><br><br>

            <h4 style="text-align: center; color: black;">Please Sign up to be a Customer</h4><br>
          <?php
               if(isset($_POST["submit"]))
               {   $sql=$db->query("SELECT * FROM customer WHERE MAIL='{$_POST["email"]}'");
			if ($sql->num_rows>0) 
                          {
				echo "<div class='error'>Email already exists in the database!</div>";
			     }
		else
                  {
                $sq="insert into customer(RNO,NAME,LNAME,PASSWORD,PHONE,MAIL) values ('{$_POST["rno"]}','{$_POST["fname"]}','{$_POST["lname"]}','{$_POST["password"]}','{$_POST["phone"]}','{$_POST["email"]}')";
                
                if($db->query($sq))
                {
                  echo "<div class='success'>Registered Successfully</div>";

                }
                else
                {
                  echo "<div class='error'>Insert Failed</div>";
                }
                 }
              }
           ?>
      
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="lbox" style="text-align: center; color: black">
          <label> ID</label><br>
            <?php
              $no="S101";
              $sql="select * from customer order by ID desc limit 1";
              $res=$db->query($sql);
              if($res->num_rows>0)
              {
                $row1=$res->fetch_assoc();
                $no=substr($row1["RNO"],1,strlen($row1["RNO"]));
                $no++;
                $no="S".$no;
              }
            
            ?>  
          <input type="text" class="input" name="rno" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
          <label> First Name</label><br>
          <input type="text" class="input" name="fname" required autofocus placeholder="fname" pattern="[a-zA-Z ]{3,}" title="Please enter more than three letters"><br><br>
  
        
          <label> Second Name</label><br>
          <input type="text" class="input" name="lname" required autofocus placeholder="lname" pattern="[a-zA-Z ]{3,}" title="Please enter more than three letters"><br><br>
  
	
          <label> Password</label><br>
          <input type="password" maxlength="8" class="input" name="password" required autofocus placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
  
          <label> Phone No</label><br>
          <input type="text" class="input" name="phone" pattern="[0-9]{10}" title="Only 10 digits allowed"  placeholder="Phone number" required=""><br><br>
        
          <label> Mail Id</label><br>
          <input type="email" class="input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email address." required=""><br><br>
		
				
					<br><br>
					
          
							
      <button type="submit" class="primary-button" name="submit">Sign Up</button><br><br><br>
        </div>
          
        </form>
        
        
        </div>
        
        
      </div>
  



  <!-- FOOTER -->
 <?php include"web_footer.php";?>
  <!-- /FOOTER -->

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
							$.post("search_u_events.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>