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
	
	
<?php include "menubar.php"?>
				
		<?php
			include"database.php";
	
			$s="select * from upcoming_programmes where AID='4'";
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
																<a href='single-programme_slide.php?id={$r["id"]}' class='primary-button'>Click for More</a>
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
							<div class='section-bg' style='background-image: url(./img/k.jpg);'>

							</div>
								<div class='home'>
									<div class='container'>
										<div class='row'>
											<div class='col-md-8'>
												<div class='home-content'>
													<h1>Skill for Life</h1>
														<p class='lead'>KViK stands for skill development centre : a skill
															for a lifelong livelihood and success!!</p>
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





	<!-- OPERATONS -->
				<!-- /section title -->
				<?php
				include"database.php";
	
				$s="select * from programmes where AID='4'";
				$res=$db->query($s);
				if($res->num_rows>0)
				{


	echo "
	<div id='events' class='section'>
		<!-- container -->
		<div class='container'>
			<!-- row -->
			<div class='row'>
				<!-- section title -->
				<div class='col-md-8 col-md-offset-2'>
					<div class='section-title text-center'>
						<h2 class='title'>Our Programmes</h2>-
						<p class='sub-title'>The classes run in 2 hour batches from morning to evening, to help those who work to ‘earn and learn’. Full day courses are offered to those who are not working.</p>
					</div>
				</div> ";
					while($r=$res->fetch_assoc())
					{
					

						echo "
						
								<!-- event -->
								<div class='col-md-6'>
									<div class='event'>
										<div class='event-img'>
											<a href='single-programme.php?id={$r["id"]}'>
												<img src='{$r["slide"]}'>
											</a>
										</div>
										<div class='event-content'>
											<h3><a href='single-programme.php?id={$r["id"]}'>{$r["programme_name"]}</a></h3>
											<ul class='event-meta'>
												<li><i class='fa fa-money'></i>{$r["price"]}</li>
											</ul>
											<p>{$r["description"]}</p>
										</div>
									</div>
								</div>
								<!-- /event -->";
					}
				}
			?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /EVENTS -->
<center>
			<h4>•In all the courses, fees should be paid in advance.</h4>
			<h4> 
•	Those staying in dormitory will pay a fee of Rs. 2000 per month for lodging and food.</h4><h4>
•	Those staying in dormitory will have training of 8 hours per day, instead of 2 hours. Therefore, they will complete the training in 3 months.
</h4></center>
<br>



	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>