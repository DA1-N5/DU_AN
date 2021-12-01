<?php
session_start();
include("PHPMailer/src/PHPMailer.php");
include("PHPMailer/src/Exception.php");
include("PHPMailer/src/OAuth.php");
include("PHPMailer/src/POP3.php");
include("PHPMailer/src/SMTP.php");

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'vannamhdvt@gmail.com';                 // SMTP username
    $mail->Password = 'povfhiusxeldbtmj';                           // SMTP password

    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                       // TCP port to connect to
    $mail->CharSet = 'UTF-8';
 
    //Recipients
    $mail->setFrom('vannamhdvt@gmail.com', 'LOVEONEX');
    $mail->addAddress($_SESSION['checkMail']['email'], $_SESSION['checkMail']['ten']);     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_SESSION['checkMail']['chu_de'];
    $mail->Body    = $_SESSION['checkMail']['noi_dung'];
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    $_SESSION['error'] = "<script>alert('Đã gửi mã code vào email mời bạn xác nhận');</script>";
} catch (Exception $e) {
    $_SESSION['error'] = "Email không đúng: ".$_SESSION['checkMail']['email'];
    header('location: ' . BASE_URL . '/sign-up');
    die;
}
if(intval($_GET['id']) == 1) {
    header('Location: ' . BASE_URL . '/check-code-form');
}

if(intval($_GET['id'] == 2)) {
    header('Location: ' . BASE_URL . '/check-code-form');
}
?>