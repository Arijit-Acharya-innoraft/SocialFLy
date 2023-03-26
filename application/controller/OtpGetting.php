<?php
session_start();
require_once "application/model/Utilities.php";
require_once "application/model/db_conn.php";
class OtpGetting {

  public $u_otp;

  /**
   * This funnction concatinates the user entered opt(in parts) into the original otp.
   */
  function __construct()
  {
    $this->u_otp = $_POST["otp1"] . $_POST["otp2"] . $_POST["otp3"] . $_POST["otp4"];
  }

  /**
   * This method is used to call the fetchingOtp method for fetching the Otp.
   * It then matches the customer entered otp with the system generated otp.
   * @param con
   *  It is used for creating an object of mysqli and using its methods. 
   */
  function checkOtp($con) {
    // Checking for otp match.
    if($this->u_otp == $_SESSION["otp"]) {
      $utility = new Utilities;
      $utility->storeData($con,$_SESSION["email"],$_SESSION["U_name"],$_SESSION["pass"]);
      header("location: home");
    }
    // Throwing error if not matched.
    else {
      $_SESSION["msg"] = "OTP MISMATCH";
      header("location: otpvalidation");
    }
  }

}

// Creating an object of GettingOTP.
$otpClass = new OtpGetting;
$otpClass->checkOtp($con);
?>