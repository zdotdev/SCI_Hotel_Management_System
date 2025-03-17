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
	<div class="container" style="padding: 50px 0;">
		<div class="panel panel-default" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
			<div class="panel-body" style="padding: 40px;">
				<h3 style="color: #2c3e50; text-align: center; font-weight: 700; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px;">Contact Us</h3>
				
				<div class="row">
					<div class="col-md-6" style="text-align: center;">
						<img src="images/a.jpeg" width="300" height="300" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); margin-bottom: 30px;" />
					</div>
					
					<div class="col-md-6">
						<div style="background: #f8f9fa; padding: 30px; border-radius: 10px;">
							<div style="margin-bottom: 20px;">
								<h4 style="color: #3498db; font-weight: 600;">Get in Touch</h4>
								<div style="margin: 15px 0;">
									<p style="margin-bottom: 10px;"><i class="fa fa-phone" style="color: #3498db; margin-right: 10px;"></i>Mobile: 09097572824/09189576871</p>
									<p style="margin-bottom: 10px;"><i class="fa fa-phone-square" style="color: #3498db; margin-right: 10px;"></i>Tel: 042-7045-056</p>
									<p style="margin-bottom: 10px;"><i class="fa fa-envelope" style="color: #3498db; margin-right: 10px;"></i>Email: dewey.marinduque@gmail.com</p>
									<p style="margin-bottom: 10px;"><i class="fa fa-map-marker" style="color: #3498db; margin-right: 10px;"></i>Address: Brgy. Maharlika Sta.Cruz Marinduque</p>
									<p style="margin-bottom: 10px;"><i class="fa fa-facebook-square" style="color: #3498db; margin-right: 10px;"></i>Facebook: Dewey Hotel & Restaurant</p>
								</div>
							</div>
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