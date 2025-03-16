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
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
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
			<li class="active"><a href = "payment.php">Payment <?php if($pending_count > 0): ?><span class="badge"><?php echo $pending_count; ?></span><?php endif; ?></a></li>		
            <li><a onclick="logout()" style="cursor: pointer;">log out</a></li>		
		</ul>	
	</div>
	<br />
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sender Name</th>
                            <th>Reference Number</th>
                            <th>Room ID</th>
                            <th>Payment Amount</th>
                            <th>Date Created</th>
                            <th>Action</th>
                            <th>Release Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_POST['payment_id'])) {
                        $payment_id = $_POST['payment_id'];
                        $action = $_POST['action'];
                        
                        if($action === 'approve') {
                            $query = $conn->query("UPDATE payments SET status = 'received' WHERE payment_id = '$payment_id'") or die(mysqli_error($conn));
                        } else if($action === 'reject') {
                            $query = $conn->query("DELETE FROM payments WHERE payment_id = '$payment_id'") or die(mysqli_error($conn));
                        }
                        echo "success";
                        exit;
                    }
                    ?>

                    <script>
                    function handlePayment(payment_id, action) {
                        if(action === 'reject') {
                            if(!confirm('Are you sure you want to reject this payment?')) {
                                return;
                            }
                        }
                        
                        $.ajax({
                            type: 'POST',
                            url: window.location.href,
                            data: {
                                payment_id: payment_id,
                                action: action
                            },
                            success: function(response) {
                                location.reload();
                            }
                        });
                    }

                    function generateReceipt(payment_id) {
                        window.open('generate_receipt.php?payment_id=' + payment_id, '_blank');
                    }
                    </script>

                    <?php
                    $query = $conn->query("SELECT * FROM `payments` ORDER BY created_at DESC") or die(mysqli_error($conn));
                    while($fetch = $query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fetch['sender_name'])?></td>
                        <td><?php echo htmlspecialchars($fetch['reference_number'])?></td>
                        <td><?php echo htmlspecialchars($fetch['room_id'])?></td>
                        <td><?php echo strtoupper(htmlspecialchars($fetch['payment_denom']))?></td>
                        <td><?php echo date('M d, Y h:i A', strtotime($fetch['created_at']))?></td>
                        <td>
                            <center>
                            <?php if($fetch['status'] != 'received'): ?>
                                <button class="btn btn-success" onclick="handlePayment(<?php echo $fetch['payment_id']?>, 'approve')">
                                    <i class="glyphicon glyphicon-check"></i> Mark as Received
                                </button>
                                <button class="btn btn-danger" onclick="handlePayment(<?php echo $fetch['payment_id']?>, 'reject')">
                                    <i class="glyphicon glyphicon-remove"></i> Reject
                                </button>
                            <?php else: ?>
                                <span class="label label-success">Received</span>
                            <?php endif; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <button class="btn btn-primary" onclick="generateReceipt(<?php echo $fetch['payment_id']?>)">
                                    <i class="glyphicon glyphicon-file"></i> Generate Receipt
                                </button>
                            </center>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<br />
	<br />
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>