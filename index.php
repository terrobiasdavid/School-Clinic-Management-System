
<!DOCTYPE HTML>
<html>
	<head>
		<title>BatStateU Infirmary Management System</title>
		<link href="css/style2.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {

			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<!--start-wrap-->

			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php" style="font-size: 35px; color: white; font-weight: bold;" >BatStateU Infirmary Management System</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.php"; style="color: darkred; font-weight: bold;">Home</a></li>

						<li class="active"><a href="https://batstate-u.edu.ph/contact-us/"; style="color: darkred; font-weight: bold;">contact</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<div class="clear"> </div>
			<!--start-image-slider---->
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/bsu.jpg" alt=""></li>
					      <li><img src="images/clinic.jpg" alt=""></li>
					      <li><img src="images/clinic1.jpg" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
		    <div class="clear"> </div>
		    <div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">


				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/studentlogo.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Student</h3>
						  <p>(Check Health Status & Request Medical Record)</p>
						  <div class="button"><span><a href="login_stud.php">Click Here</a></span></div>
				    </div>
				</div>
				

					<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/adminlog.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Admin Login</h3>
						  <p>(Register Student & Edit Student Health Info)</p>
						  <div class="button"><span><a href="login_admin.php">Click Here</a></span></div>
				     </div>
				</div>
			</div>
		    </div>
		   </div>
		   <div class="wrap">
		   <div class="content-box">
		   <div class="section group">

			</div>
		   </div>
		   </div>
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="https://batstate-u.edu.ph/contact-us/">contact</a></li>
					</ul>
		   	</div>

		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>
