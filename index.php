<script>
	let access_token = document.cookie
        .split('; ')
        .find(row => row.startsWith('access_token='))
        ?.split('=')[1] || null;

	if (!access_token) {
		window.location.href = '/Online_Hotel_Reservation/Online_Hotel_Reservation/register.php';
	}

	function logout (){
		document.cookie = "access_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		window.location.href = '/Online_Hotel_Reservation/Online_Hotel_Reservation/register.php';
	}
	
</script>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Dewey Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style="background-color: #2c3e50; padding: 15px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" style="color: #ecf0f1; font-size: 28px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
					<span style="color: #3498db;">D</span>ewey Hotel
				</a>
			</div>
			<ul id="menu" style="background-color: transparent; padding: 0; margin: 7px 0 0 0; list-style: none; float: right;">
				<li style="display: inline-block; margin: 0 20px;">
					<a href="index.php" style="color: #ecf0f1; text-decoration: none; font-size: 16px; font-weight: 500; padding: 8px 15px; border-radius: 4px; transition: all 0.3s ease;">Home</a>
				</li>
				<li style="display: inline-block; margin: 0 20px;">
					<a href="aboutus.php" style="color: #ecf0f1; text-decoration: none; font-size: 16px; font-weight: 500; padding: 8px 15px; border-radius: 4px; transition: all 0.3s ease;">About Us</a>
				</li>
				<li style="display: inline-block; margin: 0 20px;">
					<a href="contactus.php" style="color: #ecf0f1; text-decoration: none; font-size: 16px; font-weight: 500; padding: 8px 15px; border-radius: 4px; transition: all 0.3s ease;">Contact Us</a>
				</li>
				<li style="display: inline-block; margin: 0 20px;">
					<a href="reservation.php" style="color: #ecf0f1; text-decoration: none; font-size: 16px; font-weight: 500; padding: 8px 15px; border-radius: 4px; transition: all 0.3s ease;">Make a Reservation</a>
				</li>
				<li style="display: inline-block; margin: 0 20px;">
					<a id="logout" onclick="logout()" style="color: #e74c3c; text-decoration: none; font-size: 16px; font-weight: 500; padding: 8px 20px; border: 2px solid #e74c3c; border-radius: 4px; cursor: pointer; transition: all 0.3s ease;">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
	<style>
		#menu a:hover {
			background-color: rgba(255,255,255,0.1);
			color: #3498db !important;
		}
		#logout:hover {
			background-color: #e74c3c !important;
			color: #fff !important;
		}
		.carousel {
			margin-top: 20px;
			box-shadow: 0 8px 16px rgba(0,0,0,0.3);
			border-radius: 10px;
			overflow: hidden;
		}
		.carousel-inner {
			max-height: 80%;
		}
		.carousel-inner .item img {
			width: 100%;
			height: 85%;
			object-fit: cover;
			transition: transform 0.5s ease-in-out;
		}
		.carousel-indicators li {
			width: 12px;
			height: 12px;
			border-radius: 50%;
			margin: 0 5px;
			border: 2px solid #fff;
			background-color: transparent;
		}
		.carousel-indicators .active {
			background-color: #fff;
		}
		.carousel-control {
			background: rgba(0,0,0,0.3);
			width: 50px;
			height: 50px;
			top: 50%;
			transform: translateY(-50%);
			border-radius: 50%;
			line-height: 50px;
			font-size: 24px;
			text-shadow: none;
		}
		.carousel-control.left, .carousel-control.right {
			background-image: none;
		}
	</style>
	<div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>
		<div style="margin:auto;" class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="images/a.jpeg" alt="Hotel Image 1" />
			</div>
			<div class="item">
				<img src="images/b.jpeg" alt="Hotel Image 2" />
			</div>
			<div class="item">
				<img src="images/c.jpeg" alt="Hotel Image 3" />
			</div>
			<div class="item">
				<img src="images/d.jpeg" alt="Hotel Image 4" />
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>	
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>