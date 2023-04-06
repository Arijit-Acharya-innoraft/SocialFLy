<?php
session_start();
// Including the required dependencies.
require_once "application/model/db_conn.php";
require_once "application/model/ForgotEmailValidate.php";
require_once "SendingMail.php";
require_once  "TokenGeneration.php";
require_once "application/model/Utilities.php";

// Storing the user entered email in a session variable.
$_SESSION["email"] = $_POST["email"];

// An object of ForgotEmailValidate class is created whose object checks for the existance of the email in the database.
// The method returns error if any.
$fev = new ForgotEmailValidate;
$error = $fev->checkEmail($con, $_POST["email"]);

// If the email is found in the database no error is returned and moves to the next step.
if ($error == "") {

  // An object of ForgotPassword is created.
  $fp = new ForgotPassword;
  // Its method is called for sending the required token based link to the respective email.
  $fp->execution($con);
}

// If the email doesn't exists in the database an error msg is thrown to the user and is redirected back.
else {
  $_SESSION["msg"] = $error;
  header("location: forgotpassword");
}


/**
 * This class is used for generating a token based link for the users who has forgot their password.
 */

class ForgotPassword
{

  /**
   * This method is used for calling a token generating class,token storing class and mail sending class.
   * It also creates link for the user to reset the password.
   */
  function execution($con)
  {
    // Calling the token class and its methods to generate the token. 
    $tg = new TokenGeneration;
    $token = $tg->generatingToken();

    // Creating an object of a class and calling its method for token updation in the database.
    $tu = new Utilities;
    $tu->updateToken($con, $token, $_SESSION["email"]);

    // Creating a link using the token.
    $link = "http://test.com/resetpassword?token=" . $token;

    // Creating an object of SendingMail class and calling its method,where the email subject body and the senders address is sent as parameters.
    $sm = new SendingMail;
    $sm->mailGeneration("Reset Password", $link, $_POST["email"]);
    header("location: openmail");
  }
  
}

?>
