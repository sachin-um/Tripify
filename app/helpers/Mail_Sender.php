<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../app/vendor/autoload.php';


function sendMail($email,$user){
    $mail = new PHPMailer(true);
    $otp=rand(100000,999999);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'projecttripify@gmail.com';                     
        $mail->Password   = MAIL_PASSWORD;                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom('tripify@gmail.com', 'Tripify');
        $mail->addAddress($email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Verify Your Tripify Email Address';
        $mail->Body    = "<p> Dear $user,</p> <h3>Your verification code is $otp.<br></h3>
        <p> Use this code to verify your account.</p>
        <br><br>
        <p>With regards,</p>
        <b>Tripify.</b>";

        $mail->send();

        return $otp;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendAdminMail($email,$user){
    $mail = new PHPMailer(true);
    $otp=rand(100000,999999);
    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'projecttripify@gmail.com';                     
        $mail->Password   = MAIL_PASSWORD;                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom('tripify@gmail.com', 'Tripify');
        $mail->addAddress($email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Admin Ragistration Confirmation';
        $mail->Body    = "<p> Dear $user,</p> Congratulations for being singned up as an adminstrator of the Tripfy team.<br>
        <p> Your username : $email</p>
        <br>
        
        <p>Click the link below to change the password of your account</p>
        <br>
        <p>http://localhost/Tripify/Admins/changepassword/$otp</p>
        <br><br>
        <p>With regards,</p>
        <b>Tripify.</b>";

        $mail->send();

        return $otp;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



function sendResetPasswordMail($email){
    $mail = new PHPMailer(true);
    $otp=rand(100000,999999);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'projecttripify@gmail.com';                     
        $mail->Password   = MAIL_PASSWORD;                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom('tripify@gmail.com', 'Tripify');
        $mail->addAddress($email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Reset Password of Your Tripify Account';
        $mail->Body    = " <h3>Your verification code is $otp.<br></h3>
        <p> Use this code to reset your Tripify account password.</p>
        <br><br>
        <p>With regards,</p>
        <b>Tripify.</b>";

        $mail->send();

        return $otp;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>