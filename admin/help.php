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

			<li><a href = "home.php">Home</a></li>
			<li><a href = "account.php">Accounts</a></li>
			<li><a href = "reserve.php">Reservation</a></li>
			<li><a href = "room.php">Room</a></li>	
			<?php 
				$query_pending = $conn->query("SELECT COUNT(*) as pending_count FROM payments WHERE status = 'pending'") or die(mysqli_error($conn));
				$pending_count = $query_pending->fetch_assoc()['pending_count'];
			?>
			<li><a href = "payment.php">Payment <?php if($pending_count > 0): ?><span class="badge"><?php echo $pending_count; ?></span><?php endif; ?></a></li>	
            <li class="active"><a href="help.php">Help</a></li>
            <li><a href="about.php">About</a></li>
			<li><a onclick="logout()" style="cursor: pointer;">Log out</a></li>
		</ul>	
	</div>
	<br />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Hotel Online Reservation and Billing System</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>1. Online Reservation System</h4>
                                <ul>
                                    <li>Room Availability Check</li>
                                    <li>Room Booking</li>
                                    <li>User Registration & Login</li>
                                    <li>Cancellation</li>
                                    <li>Payment</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>2. Hotel Management Features</h4>
                                <ul>
                                    <li>Dashboard for Admins & Staff</li>
                                    <li>Room Management</li>
                                </ul>
                                <h4>3. Billing</h4>
                                <ul>
                                    <li>Payment</li>
                                    <li>Refund Processing</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <h4>Need more help?</h4>
                            <p>Visit: Dewey Hotel at Maharlika Santa Cruz Marinduque</p>
                            <p>Email: <a href="mailto:ynaparreno01@gmail.com">ynaparreno01@gmail.com</a></p>
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