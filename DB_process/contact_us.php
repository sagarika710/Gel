<?php

// require_once('../db.php');
error_reporting(0);
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
require '../vendor/autoload.php';
// session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST["contact-btn"])) {
   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = ($_POST['country']);
    $message = ($_POST['message']);

    // use contact@galileolife.ca
// pwd: Contact@0320
    
$mail = new PHPMailer(true);

// $mail->SMTPDebug = 3;                                       
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true; 
$mail->Username   = 'contact.galileolife@gmail.com';        //email-id         
$mail->Password   = 'contact.galileolife@123';             //password           
$mail->SMTPSecure = 'tls';         //ssl       tls               
$mail->Port       = 587;  //465 587
$mail->addReplyTo($email, $first_name.' '.$last_name);
$mail->setFrom('contact.galileolife@gmail.com', 'Galileo Life'); //from email and name
$mail->addAddress('contact.galileolife@gmail.com'); //receiver details

$mail->isHTML(true);

$mail->Subject = 'Contact Mail';
$mail->Body = ' <table>
                <tr>
                    <td>Full Name: </td>
                    <td>'.$first_name.' '.$last_name.'</td>
                 </tr>
                 <tr>
                    <td>Email: </td>
                    <td>'.$email.'</td>
                 </tr>
                 <tr>
                    <td>Phone no:</td>
                    <td>'.$phone.'</td>
                 </tr>
                 <tr>
                    <td>City: </td>
                    <td>'.$city.'</td>
                 </tr>
                 <tr>
                 <td>Country: </td>
                 <td>'.$country.'</td>
              </tr>
                 <tr>
                    <td>Message: </td>
                    <td>'.$message.'</td>
                 </tr>
                </table>';
$mail->isHTML(true);

if ($mail->send()) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Thank You for Contacting us..')
       window.location.href='../index.php';
        </SCRIPT>");
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Server error.')
   window.location.href='../index.php';
    </SCRIPT>");
}

$mail->smtpClose();

      
}


?>