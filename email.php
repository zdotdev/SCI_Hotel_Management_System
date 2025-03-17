<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function include_email($sender_name, $reference_number) {
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/phpmailer/phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'zeddotdev@gmail.com';
        $mail->Password = 'oxzl rvqp dwrk kuif ';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('zeddotdev@gmail.com', 'Mailer');
        $mail->addAddress('grimaldoapril8@gmail.com', 'Recipient Name');

        $mail->isHTML(true);
        $mail->Subject = 'Hotel Reservation Confirmation';
        $mail->Body    = "Dear Admin,<br><br>
                  A new payment has been received.<br>
                  Reference number: <b>" . $reference_number . "</b><br>
                  Customer name: <b>" . $sender_name . "</b><br><br>
                  Please review and process this reservation.<br><br>
                  Best regards,<br>
                  System Notification";
        $mail->AltBody = "Dear Admin,\n\n
                  A new payment has been received.\n
                  Reference number: " . $reference_number . "\n
                  Customer name: " . $sender_name . "\n\n
                  Please review and process this reservation.\n\n
                  Best regards,\n
                  System Notification";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
