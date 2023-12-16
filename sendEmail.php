<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    $to = "your_email@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'your_gmail_username@gmail.com'; // Your Gmail username
        $mail->Password = 'your_gmail_password'; // Your Gmail password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email);
        $mail->addAddress($to);

        //Content
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nAddress: $address\nEmail: $email\nNumber: $number\n\nMessage:\n$message";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
} else {
    echo "Invalid request";
}
?>
