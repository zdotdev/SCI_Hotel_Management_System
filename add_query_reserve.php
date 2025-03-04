<?php
	$conn = new mysqli("localhost", "root", "Regular69.", "db_hor") or die(mysqli_error($conn));
	if(isset($_POST['add_guest'])){
		$firstname = $conn->real_escape_string($_POST['firstname']);
		$middlename = $conn->real_escape_string($_POST['middlename']);
		$lastname = $conn->real_escape_string($_POST['lastname']);
		$address = $conn->real_escape_string($_POST['address']);
		$contactno = $conn->real_escape_string($_POST['contactno']);
		$checkin = $conn->real_escape_string($_POST['date']);
		$stmt = $conn->prepare("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) VALUES(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstname, $middlename, $lastname, $address, $contactno);
		$stmt->execute();
		$stmt->close();
		
		$stmt = $conn->prepare("SELECT * FROM `guest` WHERE `firstname` = ? && `lastname` = ? && `contactno` = ?");
		$stmt->bind_param("sss", $firstname, $lastname, $contactno);
		$stmt->execute();
		$query = $stmt->get_result();
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
							$query_room = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$room_id'");
							$room_data = $query_room->fetch_array();
							if ($room_data && isset($room_data['room_no'])) {
								$room_no = $room_data['room_no'];
								$conn->query("INSERT INTO `transaction`(guest_id, room_id, room_no, status, checkin) VALUES('$guest_id', '$room_id', '$room_no', 'Pending', '$checkin')") or die(mysqli_error($conn));
								header("location:reply_reserve.php");
							} else {
								echo "<script>alert('Room not found!')</script>";
							}
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
			}	
		}	
}	