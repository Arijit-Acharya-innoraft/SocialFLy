<?php
session_start();
// Including the dependencies.
require_once "application/controller/SendingMail.php";
require_once "application/model/db_conn.php";
require_once "application/controller/PasswordValidation.php";
require_once "application/model/Utilities.php";

/**
 * This class checks validation of name.
 * It does not allow anything apart from letters and whitespace
 */
class NameValidation {

  /**
   * This method validates name.
   * @param name
   *  It takes the name input from the user.
   */
  function validateName($name) {
    $rtn_name="";
    $name = trim($name," ");
    // Checks if the name is empty or not.
    if (empty($name)) {
      $rtn_name = "Name should not be empty";
    }
    else {
      if((preg_match('/^[a-zA-Z]+$/', $name) == 0)) {
        $rtn_name = "Only character and white space in between text is allowed";
      }
    }
    return $rtn_name;
  }

}


// Creating an object of the NameValidation class and storing the error msg in it. 
$nv = new NameValidation;
$name_error = $nv->validateName($_POST["name"]);

// Creating an object of the PasswordValidation class and storing the error msg in it. 
$pv = new PasswordValidation;
$pass_error = $pv->validatePassword($_POST["password"]); 



/**
 * This class is used for checking the condition for passing it to the authentication page. 
 */
class ConditionChecking
{

  /**
   * This method  is used for  the condition for passing it to the authentication page.
   * @param msg_name
   *  Stores the error message for name if any.
   * @param msg_pass
   *  Stores the error message for password if any. 
   * @param con
   *  Used for creating an object of mysqli and using its methods.
   */
  function checkCondition($msg_name, $msg_pass, $con)
  {
    // Checking for error message in name and password and displaying the result. If no error moving to next.
    if ($msg_name == "" && $msg_pass == "") {
      $utilitie = new Utilities;
      $data = $utilitie->checkPrevUser($con,$_POST["email"]);

      // Checking if new email is equal to previous email.
      if ($_POST["email"] == $data["email"]) {
        $_SESSION["msg"] = "User exists!";
        header("location: register");
      } 
      else {
        // Storing the emaial, name and user entered password in session.
        $_SESSION['pass'] = $_POST['password'];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["U_name"] = $_POST["name"];

        // Generating a four digit number, storing it in session. 
        $otp = rand(1000, 9999);
        $_SESSION["otp"] = $otp;
        // Sending mail in the user given address.
        $sm = new SendingMail;
        $sm->mailGeneration("Mail Validation", $otp, $_SESSION["email"]);
        header("location: otpvalidation");
      }
    } 
    elseif ($msg_name != "") {
      $_SESSION["msg"] = $msg_name;
      header("location: register");
    } 
    else {
      $_SESSION["msg"] = $msg_name . " " . $msg_pass;
      header("location: register");
    }
  }
}

//Creating an object and calling its  method.
$cc = new ConditionChecking;
$cc->checkCondition($name_error, $pass_error, $con);
