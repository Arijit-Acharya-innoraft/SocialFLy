<?php
// Including the autoload.
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * This function is used for sending mail to the recipient.
 */

class SendingMail {
  
  /**
   * This function is used for generating mail using PHPMAILER.
   * @param $subject
   *  It stores the subject of the mail.
   * @param $body 
   *  This stores the body of the mail.
   * @param $address
   *  It stores the address of the sender.
   */
  function mailGeneration($subject, $body, $address)
  {
    $mail = new PHPMailer(TRUE);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "evalid41@gmail.com";
    $mail->Password = "iyljhnsjinsvyvjo";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->setFrom("evalid41@gmail.com");
    // Setting the receiver's email address.
    $mail->addAddress($address);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->send();
  }

}

?>
