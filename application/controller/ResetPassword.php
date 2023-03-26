<?php
session_start();
require_once "application/model/db_conn.php";
require_once "application/controller/PasswordValidation.php";
require_once "application/model/ResetPasswordDatabase.php";
class ResetPassword {

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

$rs_valid = new PasswordValidation;
$error = $rs_valid->validatePassword($_POST["password"]); 

$rp = new ResetPassword;
$rp->resetCondition($error,$con);
?>