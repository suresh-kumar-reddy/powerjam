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
							<div class='section-bg' style='background-image: url(./img/e1.jpg);'>

							</div>
								<div class='home'>
									<div class='container'>
										<div class='row'>
											<div class='col-md-8'>
												<div class='home-content'>
													<h1>Power Jam</h1>
														<p class='lead'>Power Jam provides customers to hire trusted professionals for all their electrical service needs.</p>
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

			
				<?php
			include"database.php";
	
			$s="select * from c_events where AID='1'";
			$res=$db->query($s);
			if($res->num_rows>0)
			{
				echo "

	
	
	<!-- CAUSESS -->
	<div id='causes' class='section'>
		<!-- container -->
		<div class='container'>
			<!-- row -->
			<div class='row'>

				<!-- section title -->
				<div class='col-md-8 col-md-offset-2'>
					<div class='section-title text-center'>
						<h2 class='title'>Events</h2>
						<p class='sub-title'>Services provided by Power Jam.</p>
					</div>
				</div>
				<!-- section title -->
				";
				
				while($r=$res->fetch_assoc())
				{

				echo "
				<!-- causes -->
				<div class='col-md-4'>
					<div class='causes'>
						<div class='causes-img'>
							<a href='{$r["event_link"]}'>
							<img src='{$r["slide"]}' height=250 width=100>
							</a>
						</div>
						<div class=causes-content>
							<h3><a href='{$r["event_link"]}'>{$r["event_name"]}</a></h3>
							<p>{$r["event_date"]}&nbsp;&nbsp;&nbsp;&nbsp;By&nbsp;&nbsp;{$r["event_by"]}</p>
							
							<p>{$r["description"]}</p>
							<div class='article-tags-share'>
							
							<ul class='share'>
									<li>SHARE:</li>
									<li><a href='#'><i class='fa fa-twitter'></i></a></li>
									<li><a href='#'><i class='fa fa-facebook'></i></a></li>
									<li><a href='#'><i class='fa fa-google-plus'></i></a></li>
									<li><a href='#'><i class='fa fa-pinterest'></i></a></li>
									<li><a href='#'><i class='fa fa-instagram'></i></a></li>
								</ul>
								</div>
	
						</div>
					</div>
				</div>
				<!-- /causes -->
				";
				}

		

echo "
			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /CAUSESS -->
	";
}
?>

	
	
 <?php
 include"web_footer.php";
 ?>
</body>

</html>
