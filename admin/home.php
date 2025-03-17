<script>
	function logout() {
		document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		window.location.href = "/Online_Hotel_Reservation/Online_Hotel_Reservation/admin/";
	}
</script>

<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "en">
	<head>
		<title>Dewey Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Dewey Hotel</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> log out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">

			<li class = "active"><a href = "home.php">Home</a></li>
			<li><a href = "account.php">Accounts</a></li>
			<li><a href = "reserve.php">Reservation</a></li>
			<li><a href = "room.php">Room</a></li>	
			<?php 
				$query_pending = $conn->query("SELECT COUNT(*) as pending_count FROM payments WHERE status = 'pending'") or die(mysqli_error($conn));
				$pending_count = $query_pending->fetch_assoc()['pending_count'];
			?>
			<li><a href = "payment.php">Payment <?php if($pending_count > 0): ?><span class="badge"><?php echo $pending_count; ?></span><?php endif; ?></a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="about.php">About</a></li>
			<li><a onclick="logout()" style="cursor: pointer;">Log out</a></li>
		</ul>	
	</div>
	<br />
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="text-center">
							<h2 class="text-primary">Welcome to Dewey Hotel</h2>
							<p class="lead">Experience luxury and comfort at its finest</p>
							<div class="thumbnail" style="border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
								<img src="../images/1.jpg" class="img-responsive" alt="Hotel" style="max-height: 600px; width: 100%; object-fit: cover;">
							</div>
							<div class="well" style="background: rgba(0,0,0,0.02); margin-top: 20px;">
								<h4>Hotel Management Dashboard</h4>
								<p>Manage reservations, rooms, and customer accounts efficiently</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>