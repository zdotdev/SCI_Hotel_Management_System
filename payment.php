<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement</title>
</head>
<body>
    <main style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="display:flex; outline: 2px solid black; width: 50%; height: 50%; border-radius: 2rem;">
            <div style="width: 50%; height: 100%;">
                <img src="./images/sampl_qr.jpeg" style=" width: 100%; height: 100%; border-radius: 2rem;" alt="">
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 50%; height: 100%;">
                <p style="font-size: 2rem;">Number: 09123456789</p>
                <p style="font-size: 1.5rem;">Name: Juan Dela Cruz</p>
                <div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $sender_name = $_POST['sender_name'];
                        $reference_number = $_POST['reference_number'];
                        $denom = $_GET['denom'];
                        include('./admin/connect.php');
                        include('./email.php');
                        include_email($sender_name, $reference_number);
                        
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $sql = "INSERT INTO db_hor.payments (sender_name, reference_number, payment_denom) VALUES ('$sender_name', '$reference_number', '$denom')";
                        
                        if ($conn->query($sql) === TRUE) {
                            header("Location: /Online_Hotel_Reservation/Online_Hotel_Reservation/reply_reserve.php");
                            exit();
                        }
                        
                        $conn->close();
                    }
                    ?>
                    <form method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                        <input type="text" name="sender_name" placeholder="Enter Full Name" 
                            style="padding: 0.5rem; border-radius: 0.5rem; border: 1px solid #ccc;">
                        <input type="text" name="reference_number" placeholder="Enter Reference Number" 
                            style="padding: 0.5rem; border-radius: 0.5rem; border: 1px solid #ccc;">
                        <button type="submit" 
                            style="padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; 
                            background-color: #007bff; color: white; cursor: pointer;">
                            Submit Payment Information
                        </button> 
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>