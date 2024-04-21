<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require_once('../config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * @throws Exception
 */
function envoi_mail($to_name, $to_email, $subject, $message)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = YFC_MAIL;
    $mail->Password = YFC_PASSWORD;

    $mail->setFrom(YFC_MAIL, YFC_NAME);
    $mail->addAddress($to_email, $to_name);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $result = $mail->Send();

    // Affichage des informations de débogage
    ob_start();
    var_dump($result);
    $debug_info = ob_get_clean();
    echo '<pre>';
    echo $debug_info;
    echo '</pre>';

    return $result;
}

?>
