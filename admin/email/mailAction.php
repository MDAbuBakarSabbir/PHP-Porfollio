<?php

include ("../config/database_conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include 'src/PHPMailer.php';
include 'src/SMTP.php';
include 'src/Exception.php';

if(isset($_POST['emailbtn'])){

    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $email_body = $_POST['email_body'];


    if($sender_name && $sender_email && $email_body){

        $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'citmiawd2402@gmail.com';                   //SMTP username
            $mail->Password   = 'oyvsdwidzsgtxkpc';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($mail->Username, 'SABALON TECHNOLOGIES');
            $mail->addAddress($sender_email, $sender_name);     //Add a recipient            //Name is optional
            $mail->addReplyTo($mail->Username);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome to SABALON Community';
            $mail->Body    = "Hi $sender_name,
                                <br>
                                Thank you so much for your support and trust. Its been a pleasure working with you. Looking forward to our continued collaboration!
                                <br>
                                Best Regurds,
                                <br>
                                'Sabbir Ahamed'<br>
                                'CEO";

             if($mail->send()){
                $insert_query = "INSERT INTO email (name,email,body) VALUES ('$sender_name','$sender_email','$email_body')";

                mysqli_query($db,$insert_query);
    
                header('location: ../../index.php#contact');
             }

    }


}



?>