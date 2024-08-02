<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $emailAddress = $_POST['emailaddress'];
    $subjectMatter = $_POST['subjectmatter'];
    $message = $_POST['message'];

    // Sanitize and validate email
    $emailAddress = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format"); window.location.href = "../index.php";</script>';
        exit();
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'live.smtp.mailtrap.io'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'api'; 
        $mail->Password = '75fff19e0f7bc8bec581b1acee3f5503'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        // Recipients
        $mail->setFrom($emailAddress, "$firstName $lastName");
        $mail->addAddress('rsearle99@gmail.com');

        // Content
        $mail->isHTML(false);
        $mail->Subject = "$firstName $lastName - $subjectMatter";
        $mail->Body    = "Message: $message\n\nFrom: $emailAddress";

        // Send the email
        $mail->send();
        echo '<script>alert("Email sent successfully!"); window.location.href = "../index.php";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '"); window.location.href = "../index.php";</script>';
    }
} else {
    // Handle invalid request method
    echo '<script>alert("Invalid request method"); window.location.href = "../index.php";</script>';
}
