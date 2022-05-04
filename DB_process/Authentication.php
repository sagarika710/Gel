<?php

session_start(); 
require './../db.php';
// error_reporting(0);
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
require '../vendor/autoload.php';
// session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$oper = $_REQUEST['oper'];


if($oper == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = base64_encode($password);
    echo $pass;
    echo $username;
    $sql = "SELECT * FROM user_master where email= '$username' and binary password= '$pass'";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if($num == 1){

        echo 'here';
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username']= $data["name"];

        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Invalid Email or Password');
         window.location.href='javascript:history.go(-1)';
         </SCRIPT>");
    }

}

else if($oper == 'forgetpass'){

    $username = $_POST['username'];
    $random_otp = random_int(100000, 999999);
    $current_time= date('Y-m-d H:i:s', time());

    $sql = "SELECT * FROM user_master where email= '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username']= $username; //email id
        $mail_name = $data["name"]; //user name

        setcookie("forgetpass", "ResetPassword");

        $updateotp = "UPDATE `user_master` SET `passreset`='$random_otp',`updated_by`='$username',`updated_on`='$current_time' WHERE email= '$username'";
        $update_result = mysqli_query($conn, $updateotp);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'contact.galileolife@gmail.com';        //email-id         
        $mail->Password   = 'contact.galileolife@123';             //password           
        $mail->SMTPSecure = 'tls';         //ssl       tls               
        $mail->Port       = 587;  //465 587
        $mail->setFrom('contact.galileolife@gmail.com', 'galileo life'); //from email and name
        $mail->addAddress($username); //receiver details
        $mail->isHTML(true);
        
        $mail->Subject = 'Password reset OTP';
        $mail->Body = '<p> Hii '.$mail_name.',</p>'
                        .'</p>This is your password reset OTP '.$random_otp.'</p>';
        $mail->isHTML(true);
        
        if ($mail->send()) {               
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Password reset otp has been sent to your registered mail id..');
            window.location.href='../Galileolife_Admin/verifyotp.php';
            </SCRIPT>");
            die();
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..Try again..')
            window.location.href='./login.php';
            </SCRIPT>");
            die("Query failed: ");
        }
    }
    else{
        
        echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Invalid Email');
         window.location.href='javascript:history.go(-1)';
         </SCRIPT>");
         die("Query failed: ");
    }

}
// OTP verification
else if($oper == 'verifyotp'){
    if($_COOKIE['forgetpass'] == "ResetPassword"){
        $otp = $_POST['otp'];
        $name = $_SESSION['username'];    
        $otp_sql = "SELECT * FROM user_master where email= '$name' and passreset = '$otp'";
        $otp_result = mysqli_query($conn, $otp_sql);
        $otp_num = mysqli_num_rows($otp_result);
        if($otp_num == 1){
    
            setcookie("otpverified", "OTP verification");
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('OTP verified sucessfully..');
            window.location.href='../Galileolife_Admin/resetpassword.php';
            </SCRIPT>");
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Invalid OTP..');
             window.location.href='javascript:history.go(-1)';
             </SCRIPT>");
        }

    }
    else{
        setcookie('forgetpass', time() - 3600);
        header("Location: ./login.php");
    }   

}
// Reset password
else if( $oper == 'resetpassword'){

    if($_COOKIE['forgetpass'] == "ResetPassword" && $_COOKIE['otpverified'] == "OTP verification"){

        $password = $_POST['password'];
        $cnf_password = $_POST['cnf_password'];
        $reset= '000000';
        $current_time= date('Y-m-d H:i:s', time());
        if($password === $cnf_password){
            $name = $_SESSION['username'];
    
            $reset_sql = "SELECT * FROM `user_master` where email= '$name'";
            $reset_result = mysqli_query($conn, $reset_sql);
            $reset_num = mysqli_num_rows($reset_result);
            $updated_pass=base64_encode($password);
            if($reset_num == 1){
    
                $update_pass="UPDATE `user_master` SET `password`='$updated_pass',`passreset`='$reset',`updated_by`='$name',`updated_on`='$current_time' WHERE email = '$name'";
                // echo $update_pass;
                $up_result = mysqli_query($conn, $update_pass);
                    
                setcookie('forgetpass', time() - 3600);
                setcookie('otpverified', time() - 3600);
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('password updated sucessfully..');
                window.location.href='../Galileolife_Admin/login.php';
                </SCRIPT>");  
            }
            else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Try again..');
                 window.location.href='javascript:history.go(-1)';
                 </SCRIPT>");
            }
    
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Both password must be same..');
             window.location.href='javascript:history.go(-1)';
             </SCRIPT>");

        }
    }
    else{
        setcookie('forgetpass', time() - 3600);
        setcookie('otpverified', time() - 3600);
        header("Location: ./login.php");
    }
      

}




?>