<?php

/**
 * This class is used to validate from the database, the email that user has entered for reseting the password. 
 * It has 1 method.
 */
class ForgotEmailValidate {

  /**
   * This method is used for checking if the user entered email exists in the database or not.
   * @param $con
   * It is an object of the mysqli class.
   * @param $email
   * It is the user entered email.
   * @return
   * It returns an error if any else an empty string.
   */
  function checkEmail($con, $email) {
    // Checking if the user email exists in the database.
    $result = $con->query("SELECT u_name FROM Users WHERE email = '" . $email . "'");
    if ($result->num_rows == 0) {
      return  "email id doesn't exist";
    }
    return "";
  }

}

?>
