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
        $mail->Body    = "<p> Dear $user,</p> Congratulations for being signed up as an adminstrator of the Tripfy team.<br>
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



function accountSuspendMail($data){
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
        $mail->addAddress($data->Email);     
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Your account is suspended';
        $mail->Body    = " <h3>Notice<br></h3>
        <p>Dear User,<p><br>
        <p>Please note that your Tripify account registered under $data->Name has been suspended</p>
        <p>for violating our system guidelines.</p>
        <br>
        <p>If you think this is a mistake, please submit an appeal to this email for your
        account to be reviewed.</p><br><br>
        <p>With regards,</p><br>
        <b>Tripify Team</b>";

        $mail->send();

        return $otp;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function confirmBookingHotel($data){
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
        $mail->addAddress($data['userDetails']->Email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Confirmation of Booking';
        $mail->Body    = " <h4>Dear User,<h4><br><br>
        <p>Thank you for booking your stay with ".$data['hotelName'].".<br>
        We're looking forward to your visit</p>

        <br><br><p>Your booking details are as follows :</p>
        
        <br><br><h4>Check in :</h4><p>".$data['bookingDetails']->checkin."</p>
        <br><br><h4>Check out :</h4><p>".$data['bookingDetails']->checkout."</p>
        <br><br><h4>Booked By :</h4><p>".$data['userDetails']->Name."</p>
        <br><br><h4>Total :</h4><p>".$data['bookingDetails']->payment."</p>
        
        <p>If you have any questions please don't hesitate to contact us.</p><br>
        <p>We hope you enjoy your stay with us.</p><br><br>
        <p>Best regards,</p><br>
        <b>Tripify Team</b>";

        $mail->send();

        return $otp;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function confirmBookingTaxi($data){
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
        $mail->addAddress($data['userdetails']->Email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Confirmation of Booking';
        $mail->Body    = " <h4>Dear User,<h4><br><br>
        <p>Thank you for booking your ride with ".$data['taxiowner']->Name.".<br>
        We're looking forward to your trip.</p>
        <br><p>Your booking details are as follows :</p>
        <br><h4>Pick up :</h4><p>".$data['pickupL']."</p>
        <br><h4>Destination :</h4><p>".$data['dropL']."</p>
        <br><h4>Booking Date :</h4><p>".$data['s_date']."</p>
        <br><h4>No of Passengers :</h4><p>".$data['passengers']."</p>
        <br><h4>Booked By :</h4><p>".$data['user']->Name."</p>
        <br><h4>Total :</h4><p>".$data['total']."</p>
        
        <p>If you have any questions please don't hesitate to contact us.</p><br>
        <p>We hope you enjoy your trip with us.</p><br><br>
        <p>Best regards,</p><br>
        <b>Tripify Team</b>";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function confirmBookingGuide($data){
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
        $mail->addAddress($data['userDetails']->Email);     //Add a recipient
        

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Confirmation of Booking';
        $mail->Body    = " <h4>Dear User,<h4><br><br>
        <p>Thank you for booking your guided tour with ".$data['guideDetails']->Name.".<br>
        We're looking forward to your trip.</p>

        <br><br><p>Your booking details are as follows :</p>
        
        <br><br><h4>Location :</h4><p>".$data['Location']."</p>
        <br><br><h4>Start Date :</h4><p>".$data['StartDate']."</p>
        <br><br><h4>End Date :</h4><p>".$data['EndDate']."</p>
        <br><br><h4>Booked By :</h4><p>".$data['travelerDetails']->Name."</p>
        <br><br><h4>Total :</h4><p>".$data['payment']."</p>
        
        <p>If you have any questions please don't hesitate to contact us.</p><br>
        <p>We hope you enjoy your tour with us.</p><br><br>
        <p>Best regards,</p><br>
        <b>Tripify Team</b>";

        $mail->send();
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