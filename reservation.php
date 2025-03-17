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
	<div class="container" style="padding: 40px 20px;">
		<div class="panel panel-default" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
			<div class="panel-body" style="padding: 30px;">
				<h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 30px; text-align: center; text-transform: uppercase; letter-spacing: 2px;">MAKE A RESERVATION</h3>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysqli_error($conn));
					while($fetch = $query->fetch_array()){
				?>
					<div class="well" style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 25px; padding: 20px; transition: transform 0.3s ease;">
						<div class="row">
							<div class="col-md-5">
								<img src="photo/<?php echo $fetch['photo']?>" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />
							</div>
							<div class="col-md-7" style="padding: 20px;">
								<h3 style="color: #2c3e50; font-weight: 600; margin-bottom: 15px;"><?php echo $fetch['room_type']?></h3>
								<h4 style="color: #e74c3c; font-weight: 500; margin-bottom: 20px;">Price: ₱<?php echo number_format($fetch['price'], 2)?></h4>
								<div style="text-align: right;">
									<a href="add_reserve.php?room_id=<?php echo $fetch['room_id']?>" 
									   class="btn btn-info" 
									   style="background-color: #3498db; border: none; padding: 10px 25px; border-radius: 5px; transition: all 0.3s ease;">
										<i class="glyphicon glyphicon-list"></i> Reserve Now
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>