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
	<div style="margin: 40px auto; max-width: 1200px;" class="container">
		<div class="panel panel-default" style="border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
			<div class="panel-body" style="padding: 30px;">
				<h3 style="color: #2c3e50; font-weight: 700; text-align: center; margin-bottom: 30px;">MAKE A RESERVATION</h3>
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error($conn));
					$fetch = $query->fetch_array();
				?>
				<div style="display: flex; margin-bottom: 40px; background: #f9f9f9; border-radius: 8px; padding: 20px;">
					<div style="flex: 1;">
						<img src="photo/<?php echo $fetch['photo']?>" style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
					</div>
					<div style="flex: 1; padding: 20px;">
						<h3 style="color: #2c3e50; margin-bottom: 15px;"><?php echo $fetch['room_type']?></h3>
						<h3 style="color: #27ae60; font-weight: 600;"><?php echo "Php. ".$fetch['price'].".00";?></h3>
					</div>
				</div>

				<div style="display: flex; gap: 30px;">
					<div style="flex: 1;">
						<form method="POST" enctype="multipart/form-data" style="background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
							<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Firstname</label>
									<input type="text" class="form-control" name="firstname" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Middlename</label>
									<input type="text" class="form-control" name="middlename" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Lastname</label>
									<input type="text" class="form-control" name="lastname" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Address</label>
									<input type="text" class="form-control" name="address" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Contact No</label>
									<input type="text" class="form-control" name="contactno" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Check in</label>
									<input type="date" class="form-control" name="date_in" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Check in time</label>
									<input type="time" class="form-control" name="time_in" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Check out</label>
									<input type="date" class="form-control" name="date_out" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Check out time</label>
									<input type="time" class="form-control" name="time_out" required="required" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
								<div class="form-group">
									<label style="font-weight: 600; color: #2c3e50; margin-bottom: 8px;">Extra Bed</label>
									<input type="number" class="form-control" name="extra_bed" value="0" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
								</div>
							</div>
							<div class="form-group" style="margin-top: 25px;">
								<button class="btn btn-info form-control" name="add_guest" style="background: #3498db; border: none; padding: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
									<i class="glyphicon glyphicon-save"></i> Submit Reservation
								</button>
							</div>
						</form>
					</div>
				</div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>