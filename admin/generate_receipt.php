<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt</title>
    <style>
        .receipt {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            font-family: 'Courier New', Courier, monospace;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .receipt-header {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .receipt-body {
            margin-bottom: 15px;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .receipt-footer {
            text-align: center;
            border-top: 1px dashed #000;
            padding-top: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <?php
    require_once('../admin/connect.php');

    $payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;

    if ($payment_id) {
        $query = "SELECT p.payment_id, p.sender_name, p.reference_number, p.status, p.created_at, 
                         p.payment_denom, p.room_id, r.price as room_price
                  FROM payments p
                  LEFT JOIN room r ON p.room_id = r.room_id 
                  WHERE p.payment_id = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $payment_data = $result->fetch_assoc();
    }
    ?>

    <?php if(isset($payment_data)): ?>
    <div class="receipt">
        <div class="receipt-header">
            <h2>PAYMENT RECEIPT</h2>
            <p>Online Hotel Reservation</p>
        </div>
        
        <div class="receipt-body">
            <div class="receipt-row">
                <span>Payment ID:</span>
                <span><?php echo $payment_data['payment_id']; ?></span>
            </div>
            <div class="receipt-row">
                <span>Customer Name:</span>
                <span><?php echo $payment_data['sender_name']; ?></span>
            </div>
            <div class="receipt-row">
                <span>Reference #:</span>
                <span><?php echo $payment_data['reference_number']; ?></span>
            </div>
            <div class="receipt-row">
                <span>Status:</span>
                <span><?php echo strtoupper($payment_data['status']); ?></span>
            </div>
            <div class="receipt-row">
                <span>Room Price:</span>
                <span>₱<?php 
                    $price = ($payment_data['payment_denom'] == 'half') 
                        ? $payment_data['room_price'] / 2 
                        : $payment_data['room_price'];
                    echo number_format($price, 2); 
                ?></span>
            </div>
            <div class="receipt-row">
                <span>Amount Paid:</span>
                <span>₱<?php echo $payment_data['payment_denom']; ?></span>
            </div>
            <div class="receipt-row">
                <span>Date:</span>
                <span><?php echo date('Y-m-d H:i', strtotime($payment_data['created_at'])); ?></span>
            </div>
        </div>
        
        <div class="receipt-footer">
            <p>Thank you for your payment!</p>
            <p>Keep this receipt for your records.</p>
        </div>
    </div>
    <?php else: ?>
        <p>No payment information found.</p>
    <?php endif; ?>
</body>
</html>