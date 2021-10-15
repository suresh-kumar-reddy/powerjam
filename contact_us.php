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

<body>
	<?php
include"menubar.php";
?>



				
		<?php
			include"database.php";
	
			$s="select * from slides order by id desc";
			$res=$db->query($s);
			if($res->num_rows>0)
			{
				echo "<div id='home-owl' class='owl-carousel owl-theme'>";
						
				while($r=$res->fetch_assoc())
				{

					echo "
							<div class='home-item'>
								<div class='section-bg' style='background-image: url({$r["slide"]});'>

								</div>			
									<div class='home'>
										<div class='container'>
											<div class='row'>
												<div class='col-md-8'>
													<div class='home-content'>
														<h1>{$r["heading"]} </h1>
															<p class='lead'>{$r["description"]}</p>
																<a href='{$r["page_link"]}' class='primary-button'>Click for More</a>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						
						
					";
				}
				echo "</div>";
			}
			else
			{
				echo "
					<div id='home-owl' class='owl-carousel owl-theme'>
						<div class='home-item'>	
							<div class='section-bg' style='background-image: url(./img/bg4.jpg);'>

							</div>
								<div class='home'>
									<div class='container'>
										<div class='row'>
											<div class='col-md-8'>
												<div class='home-content'>
													<h1>Skill for Life</h1>
														<p class='lead'>Power Jam</p>
															<a href='about.php' class='primary-button'>For More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
							
							";
			}
			?>




	</header>
	<!-- /HEADER -->


	<!-- ABOUT -->
	<div id="about" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- about content -->
				<div class="col-md-8">
					<h2>POWER JAM</h2><br>
						
					<div class="about-content">
						<h4>ANY QURIES REGARDING SERVICES CAN BE MENTIONED DOWN</h4>
						<br>
						<p><li>Power Jam works 24/7 as benefit of customers.</li></p>
						<br>



          


          	<h4>Leave a Message</h4>
<br>
   <?php
            if(isset($_POST["submit"]))
            {
            	include "database.php";
                $sq="insert into contact(name,phone,email,subject,message) values('{$_POST["name"]}','{$_POST["phone"]}','{$_POST["email"]}','{$_POST["subject"]}','{$_POST["message"]}')";
                
                if($db->query($sq))
                {
                  echo "<div class='success'>Message sent Successfully</div>";

                }
                else
                {
                  echo "<div class='error'>Coudn't Send</div>";
             	 }
          

          
            }
          
          
          
          
          ?>
      
          <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="lbox" style="text-align: left; color: black">
          <input type="text" class="input" name="name" required autofocus placeholder="name" pattern="[a-zA-Z ]{3,}" title="Please enter more than three letters"><br><br>
  
        
            
<input type="text" class="input"  pattern="[0-9]{10}" title="Only 10 digits allowed" name="phone" placeholder="Phone Number" required=""> <br><br>

        
          <input type="email" class="input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email address." required="" placeholder="Email"  ><br><br>
           
          <input type="text" class="input" name="subject" required="" placeholder="Subject"><br><br>
        
          <textarea type="textbox" class="input" row="4" col="8" name="message" placeholder="Message"  required="" placeholder="Message"> 
          	</textarea><br><br>
         
      
      </center>
      <button type="submit" class="primary-button" name="submit">Send</button><br><br><br>
        </div>
          

					</div>
				</div>

					<br><br><br>				<br><br><br>					<br><br><br>			
				<!-- /about content -->
				<h4>Please Visit us</h4>
				<div class="col-md-offset-0 col-md-3">
				<div class="googlemaps"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=209248065637859079161.0004fd057920b5db77843&amp;ie=UTF8&amp;ll=12.841615,77.586157&amp;spn=0,0&amp;t=m&amp;output=embed"></iframe></div>
				
			</div>
				<!-- /about content -->
			</div>
		</div>
	</div>


</body>

</html>
