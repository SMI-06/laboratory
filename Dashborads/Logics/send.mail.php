<?php
session_start();
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    // $login_Id = $userDetail['userId'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer Autoload file

require("../includes/config.php");
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
// Super Admin  
if ($userDetail['Role'] == "Super Admin") {
    if (isset($_REQUEST['send_mail'])) {
        $user_id = $_REQUEST['id'];
        $recipients = $_REQUEST['recipient_email'];
        $subject = $_REQUEST['Subject'];
        $message = $_REQUEST['Message'];

        if (!empty($subject)) {
            if (!empty($message)) {
                $query = mysqli_query($conn, "INSERT INTO `mails`(`recipient`, `subject`, `Message`, `userId`) VALUES ('$recipients','$subject','$message','$user_id')");
                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ibraheemaligillani16@gmail.com';
                    $mail->Password = 'ngifscbwttjzpldm'; // Your Gmail password here
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->setFrom($recipients, 'Ibraheem Shah');
                    $mail->addAddress($recipients);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    $mail->send();
                    echo "<script>alert('Email Sent successfully')
                location.href = '../index.php'
                </script>";
                } catch (Exception $e) {
                    echo "<script>alert('Please Try Again: {$mail->ErrorInfo}')</script>";
                }
            } else {
                echo "<script>alert('Please Write A Message')</script>";
                header("location: ../users.all.php");
            }
        } else {
            echo "<script>alert('Please Write A Subject')</script>";
            header("location: ../users.all.php");
        }
    }
}
//  Admin 
elseif ($userDetail['Role'] == "Admin") {
    if (isset($_REQUEST['send_mail'])) {
        $user_id = $_REQUEST['id'];
        $recipients = $_REQUEST['recipient_email'];
        $subject = $_REQUEST['Subject'];
        $message = $_REQUEST['Message'];

        if (!empty($subject)) {
            if (!empty($message)) {
                $query = mysqli_query($conn, "INSERT INTO `mails`(`recipient`, `subject`, `Message`, `userId`) VALUES ('$recipients','$subject','$message','$user_id')");
                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ibraheemaligillani16@gmail.com';
                    $mail->Password = 'ngifscbwttjzpldm'; // Your Gmail password here
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->setFrom($recipients, 'Ibraheem Shah');
                    $mail->addAddress($recipients);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    $mail->send();
                    echo "<script>alert('Email Sent successfully')
                location.href = '../index.php'
                </script>";
                } catch (Exception $e) {
                    echo "<script>alert('Please Try Again: {$mail->ErrorInfo}')</script>";
                }
            } else {
                echo "<script>alert('Please Write A Message')</script>";
                header("location: ../users.all.php");
            }
        } else {
            echo "<script>alert('Please Write A Subject')</script>";
            header("location: ../users.all.php");
        }
    }
}
