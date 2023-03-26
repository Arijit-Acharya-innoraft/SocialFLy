<?php
session_start();

// Including the dependencies.
require_once "application/model/Utilities.php";
require_once "application/model/db_conn.php";

/**
 * This class is used for storing the otp from the user and matching it.
 * It has got a constructor to store the user entered otp.
 * A method named as checkOtp for matching the otp.
 */
class OtpGetting {

  /**
   * This is a class variable, will be used for storing the user entered OTP.
   */
  public $u_otp;

  /**
   * The constructor concatinates the user entered opt(in parts) into the original otp.
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
