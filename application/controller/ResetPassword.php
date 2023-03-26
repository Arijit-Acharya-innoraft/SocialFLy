<?php
session_start();
// Adding the dependencies. 
require_once "application/model/db_conn.php";
require_once "application/controller/PasswordValidation.php";
require_once "application/model/ResetPasswordDatabase.php";

/**
 * This class is used for reseting the password.
 * It has got to methods.
 */
class ResetPassword {

  /**
   * This method is used for checking adequate conditions for reseting the password.
   * @param $con
   * It is an object of the msqli class.
   */
  function validateReset($con) {

    // For checking if both, the new password and confirm password are same or not.
    if($_POST["password"] == $_POST["confirm_password"]) {
      $rpd = new ResetPasswordDatabase;
      $data = $rpd ->checkPassword($con,$_SESSION["email"]);
      if($_POST["password"] == $data["user_password"]) {
        $_SESSION["msg"] = "New password can't be same as the old password ";
        header("location: resetpassword");
      }
      else{
        $password = $_POST["password"];
        $user = $rpd->setPassword($con,$password,$_SESSION["email"]);
        $_SESSION["U_name"] = $user;
        header("location: home");
      }
    }
      $_SESSION["msg"] = "new password and confirm password didn't match";
      header("location: resetpassword");
  }

  /**
   * This method is used for checking the presence of any errors or not.
   * If error is present in password reseting,then it redirects to the reset password page.
   * @param $error
   * It stores the error.
   * @param $con
   * It is an object of the mysqli function.
   */
  function resetCondition($error,$con) {
    if($error != "") {
      $_SESSION["msg"] = $error;
      header("location: resetpassword");
    }
    else {
      $this->validateReset($con);
    }
  }

}

// Creating an object of the class PasswordValidation and calling its methods.
$rs_valid = new PasswordValidation;
$error = $rs_valid->validatePassword($_POST["password"]); 

// Creating an object of the ResetPassword class and calling its method.
$rp = new ResetPassword;
$rp->resetCondition($error,$con);

?>
