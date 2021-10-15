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
	<link rel="icon" href="./img/logo.png">
	
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
	
			$s="select * from slides where AID='1'";
			$res=$db->query($s);
			if($res->num_rows>0)
			{
				echo "<div id='home-owl' class='owl-carousel owl-theme'>";
				echo "
						<div class='home-item'>	
							<div class='section-bg' style='background-image: url(./img/e1.jpg);'>

							</div>
								<div class='home'>
									<div class='container'>
										<div class='row'>
											<div class='col-md-8'>
												<div class='home-content'>
													<h1>ABOUT US</h1>
														<p class='lead'>Power Jam provides customers to hire trusted professionals for all their electrical service needs.</p>
						<br></p>
															<a href='blog.php' class='primary-button'>For More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
						
					</div>
							
							";		
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
							<div class='section-bg' style='background-image: url(./img/e1.pjg);'>

							</div>
								<div class='home'>
									<div class='container'>
										<div class='row'>
											<div class='col-md-8'>
												<div class='home-content'>
													<h1>About Us</h1>
														<p class='lead'>Power Jam provides customers to hire trusted professionals for all their electrical service needs.</p>
															<a href='blog.php' class='primary-button'>For More</a>
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


	


	<!-- ABOUT -->
	<div id="about" class="section" style="text-align: justify;
 	 								text-justify: inter-word;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- about content -->
				<div class="col-md-8">
						<h3><center>What is Power Jam?</center></h3><br>
						
					<div class="about-content">
						<p> Power Jam is recognized as the fastest-growing startup in India.We are a mobile marketplace for a local services. We help customers hire trusted professionals for all their service needs.We are staffed with young electricians,passionate people working tirelessly to make a difference in the lives of people by catering to their service needs at their doorsteps.</p>
						<br>
					</div>
				</div>
				<!-- /about content -->

				<!-- about image -->
				<div class="col-md-offset-1 col-md-3">
					<a href="gallery.php" class="about-video">
							<img src="./img/e14.jpg" alt="">
					</a>
					<br>
					<br>
				</div>
				<!-- /about image -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->

	<!-- ABOUT -->
	<div id="about" class="section" style="text-align: justify;
 	 								text-justify: inter-word;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                                 <!-- about image -->
				<div class="col-md-offset-1 col-md-3">
					<a href="gallery.php" class="about-video">
							<img src="./img/e13.jpg" alt="">
					</a>
					<br>
				</div>

				<!-- /about image -->

				<!-- about content -->
				<div class="col-md-8">
						<h3><center>Why Power Jam?</center></h3><br><br>
				
		                      
						
					<div class="about-content">
						<center><p style='colur:black;'><b>* You get to hire the professionals of your choice to serve you.</b></p>
						<p style='colur:black;'><b>* We understand your requirements and cater to them just the way you like it.</b></p>
						<p style='colur:black;'><b>* Background verified,well trained,and experienced professionals at your service.</b></p>
                                                </center>
					</div>
				</div>
				<!-- /about content -->
                                
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->



	<!-- ABOUT -->
	<div id="about" class="section" style="text-align: justify;
 	 								text-justify: inter-word;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- about content -->
				<div class="col-md-8">
						<h3><br><br>High Quality and Trusted Professionals</h3><br><br>
						
					<div class="about-content">
						<p><b>We provide only verified,background checked and high quality professionals.</b></p>
						<br><br>
					</div>
				</div>
				<!-- /about content -->

				<!-- about video -->
				<div class="col-md-offset-1 col-md-3">
					
					<a href="gallery.php" class="about-video">
							<img src="./img/e26.jpg" alt="">
					</a>
				</div>

				<!-- /about video -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->
 
	<!-- ABOUT -->
	<div id="about" class="section" style="text-align: justify;
 	 								text-justify: inter-word;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                                <!-- about image -->
				<div class="col-md-offset-1 col-md-3">
					<br>
					<a href="gallery.php" class="about-video">
							<img src="./img/e12.jpg" alt="">

					</a>
				</div>

				<!-- /about image --> 

				<!-- about content -->
				<div class="col-md-8">
						<center><h3><br><br><br>Matched to You Needs</h3><br><br></center>
						
					<div class="about-content">
						<center><p><b>We match you with right professionals with the right budget.</b></p></center>
						<br><br>
						
					</div>
				</div>
				<!-- /about content -->

				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->
	<div id="about" class="section">
		<!-- container -->
		<div class="container">
						
			<!-- about content -->
				<div class="col-md-8">
						<h3><br><br>Hassle Free Service Delivery</h3><br><br>
						
					<div class="about-content">
						<p><b>Super convient,guaranteed services from booking to delivery.</b></p>
						<br><br>
					</div>
				</div>
				<!-- /about content -->

				<!-- about image -->
				<div class="col-md-offset-1 col-md-3">
					
					<a href="gallery.php" class="about-video">
							<img src="./img/e19.jpg" alt="">
					</a>
				</div>

				<!-- /about image -->
 			
 			<br>
 			<br>
 			

 		</div>
 	</div>
 	
 <?php
include"web_footer.php";
?>
</body>

</html>
