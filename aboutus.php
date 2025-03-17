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
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
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
	<div class="container" style="padding: 40px 20px;">
		<div class="panel panel-default" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
			<div class="panel-body" style="padding: 30px;">
				<h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 30px; border-bottom: 3px solid #3498db; padding-bottom: 10px;">ABOUT US</h3>
				<p style="font-size: 16px; line-height: 1.8; color: #34495e; margin-bottom: 40px;">
					Dewey Hotel started year 2002, located at Brgy. Maharlika Sta.Cruz Marinduque, just few blocks away or walking distance to the town center.
					It's boast an overlooking views and greeneries, rice fields and mountain side to offer a view of the sun rising over the horizon and a view of it's setting.
				</p>

				<h4 style="color: #2c3e50; font-weight: 600; margin: 30px 0; border-bottom: 2px solid #3498db; padding-bottom: 10px;">HOTEL AMENITIES</h4>
				<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">🚗 Parking Area</p>
					</div>
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">🎥 CCTV Monitoring</p>
					</div>
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">📶 Free Wifi</p>
					</div>
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">🎵 Audio Visual Equipment</p>
					</div>
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">💆 Massage Upon Request</p>
					</div>
					<div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
						<p style="margin: 0; color: #2c3e50;">🏃 Tour Guide</p>
					</div>
				</div>

				<h4 style="color: #2c3e50; font-weight: 600; text-align: center; margin: 40px 0; border-bottom: 2px solid #3498db; padding-bottom: 10px;">OUR ROOMS</h4>
				<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;">
					<div class="room-list">
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Suite A (Good for 6)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 5,000.00</p>
						</div>
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Suite B (Good for 2)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 4,500.00</p>
						</div>
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Superior Room (Good for 4)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 4,000.00</p>
						</div>
					</div>
					<div class="room-list"></div>
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Deluxe Room (Good for 2)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 2,000.00</p>
						</div>
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Ordinary Aircon (Good for 2)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 1,500.00</p>
						</div>
						<div class="room-item" style="background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
							<h4 style="color: #e67e22; margin: 0 0 10px 0;">Ventilated Room (Good for 2)</h4>
							<p style="color: #2c3e50; font-weight: 600; margin: 0;">Php 500.00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>