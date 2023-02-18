<?php
if (!empty($_POST)){
    $name = $_POST['Name'];
    $Email = $_POST['Email'];
    $message = $_POST['Message'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'monishmass29@gmail.com';                     // SMTP username
    $mail->Password   = 'yourpassword';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($Email, $name);
    $mail->addAddress('monishd2002@gmail.com', 'Monish');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact Mail '.$name;
    $mail->Body    = $message;
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}
}
?>

?>