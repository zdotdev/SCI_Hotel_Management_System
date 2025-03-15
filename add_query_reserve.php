<?php
	require_once 'admin/connect.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$checkin = $_POST['date_in'];
		$checkintime = $_POST['time_in'];
		$checkout = $_POST['date_out'];
		$checkouttime = $_POST['time_out'];
		$dayscount = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
		$extra_bed = $_POST['extra_bed'];
		$conn->query("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) VALUES('$firstname', '$middlename', '$lastname', '$address', '$contactno')") or die(mysqli_error($conn));
		$query = $conn->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `lastname` = '$lastname' && `contactno` = '$contactno'") or die(mysqli_error($conn));
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'") or die(mysqli_error($conn));
		$row = $query2->num_rows;
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Not Available Date</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error($conn));
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$room_query = $conn->query("SELECT * FROM room WHERE room_id = '$room_id'") or die(mysqli_error($conn));
							$room_data = $room_query->fetch_array();
							$price = $room_data['price'];
							$total_bill = $price * $dayscount;
							if($extra_bed == "Yes") {
								$total_bill += 300;
							}
							$conn->query("INSERT INTO `transaction`(guest_id, room_id, room_no, extra_bed, days, checkin_time, checkout, checkout_time, bill, status, checkin) VALUES('$guest_id', '$room_id', '$room_id', '$extra_bed', '$dayscount', '$checkintime', '$checkout', '$checkouttime', '$total_bill', 'Pending', '$checkin')") or die(mysqli_error($conn));
							header("location:pay.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>