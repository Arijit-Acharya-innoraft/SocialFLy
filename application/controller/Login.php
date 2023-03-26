<?php

session_start();
// Including the database connection.
require "application/model/db_conn.php";
// requiring the database check
require "application/model/LoginDatabaseCheck.php";
// Storing the user entered email & password.
$email = $_POST["email"];
$pass = $_POST["password"];

/**
 * Class for email validation.
 * It contains two methods emailSyntax and matchDb.
 * "emailSyntax" checks the syntax of the email.
 * "matchDb" matches the user entered values with the values present in database.
 */
class Login {

  /**
   * Method for checking the email syntax.
   * @param email
   *  to send the user entered email. 
   */ 
  function emailSyntax($email) {
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
      $_SESSION["msg"] = "Wrong Email address";
    }
  }

}

// Creating an object of the Email class.
$loginValidation = new Login ;
$loginValidation->emailSyntax($email);

// Creating an object for the LoginDatabaseCheck class and calling its method to validate the email and password entered by user.
$dc = new LoginDatabaseCheck;
$feedback = $dc->matchDb($email,$pass,$con);

// Response for erroneous input.
if($feedback[0]==FALSE){
  $_SESSION["msg"] = $feedback[1];
  header("location: login");
}
// Response for right input
else{
  $_SESSION['U_name'] = $feedback[1];
  $_SESSION["email"] = $email;
  header("location: home");
}
$con->close();

?>
