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
			<li><a href="help.php">Help</a></li>
            <li class="active"><a href="about.php">About</a></li>
			<li><a onclick="logout()" style="cursor: pointer;">Log out</a></li>
		</ul>	
	</div>
	<br />
    <style>
    .contact-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .contact-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        width: 250px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .contact-card img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid #f8f9fa;
    }

    .contact-card h3 {
        color: #333;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

    .contact-info {
        color: #666;
        margin: 8px 0;
        font-size: 0.9em;
        line-height: 1.4;
    }
    </style>

    <div class="contact-container">
        <div class="contact-card">
            <img src="../images/profiles/shayna.jpg" alt="Shayna Mae Parreño">
            <h3>Shayna Mae Parreño</h3>
            <div class="contact-info">Email: ynaparreno01@gmail.com</div>
            <div class="contact-info">Number: 09512435435</div>
            <div class="contact-info">Address: Tawiran Sta.Cruz Marinduque</div>
        </div>

        <div class="contact-card">
            <img src="../images/profiles/april.jpg" alt="April Grimaldo">
            <h3>April Grimaldo</h3>
            <div class="contact-info">Email: grimaldoapril8@gmail.com</div>
            <div class="contact-info">Number: 09299539259</div>
            <div class="contact-info">Address: Suha Torrijos Marinduque</div>
        </div>

        <div class="contact-card">
            <img src="../images/profiles/renzo.jpg" alt="Renzo Ordillano Nuqui">
            <h3>Renzo Ordillano Nuqui</h3>
            <div class="contact-info">Email: renzonuqui.gron@gmail.com</div>
            <div class="contact-info">Number: 09633286379</div>
            <div class="contact-info">Address: Buyabod Santa Cruz Marinduque</div>
        </div>

        <div class="contact-card">
            <img src="../images/profiles/john.jpg" alt="John Paul Pacañor">
            <h3>John Paul Pacañor</h3>
            <div class="contact-info">Email: johnpaulpacanor92@gmail.com</div>
            <div class="contact-info">Number: 09632579293</div>
            <div class="contact-info">Address: Buyabod Santa Cruz Marinduque</div>
        </div>

        <div class="contact-card">
            <img src="../images/profiles/ann.jpg" alt="Ann Margarette Dela Cruz">
            <h3>Ann Margarette Dela Cruz</h3>
            <div class="contact-info">Email: annmargarette1014@gmail.com</div>
            <div class="contact-info">Number: 09561501096</div>
            <div class="contact-info">Address: Bragay Uno Buenavista Marinduque</div>
        </div>

        <div class="contact-card">
            <img src="../images/profiles/Regiela.jpg" alt="Ma. Regielaine Rosales Espina">
            <h3>Ma. Regielaine Rosales Espina</h3>
            <div class="contact-info">Email: maregielainee@gmail.com</div>
            <div class="contact-info">Number: 09483881373</div>
            <div class="contact-info">Address: Sitio Salamague Brgy. Masaguisi Santa Cruz Marinduque</div>
        </div>
    </div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>