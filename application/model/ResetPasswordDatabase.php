<?php

/**
 * This class is for reseting the earlier password of the user.
 * It has two methods, one checks the before password and the other updates the new password. 
 */
class ResetPasswordDatabase {

  /**
   * This method checks for the existing password of the user.
   * It checcks so tht the existing password i snot the new password.
   * 
   * @param $con
   * It is an object of the mysqli class.
   * @param $email
   * It is the user entered email. 
   * 
   * @return $data 
   * Returns an associative array.
   */
  function checkPassword($con, $email)
  {
    // fetching the previous password
    $pass_before = "SELECT user_password FROM Users WHERE email = '" . $email . "';";
    $res = $con->query($pass_before);
    $data = $res->fetch_assoc();
    return $data;
  }

  /**
   * This method updates the database with the new password.
   * @param $con
   * It is an object of the mysqli class.
   * @param $email
   * It is the user entered email.
   * @param $password 
   * It stores the user entered  new password.
   * @return $store["u_name"]
   * It retuns the user name. 
   */
  function setPassword($con, $password, $email)
  {
    // Updating the new password in the database.
    $qry = "UPDATE Users SET user_password = '" . $password . "' WHERE email = '" . $email . "';";
    $con->query($qry);
    // Fetching the user name from the database and updating the $_SESSION["U_name"].
    $result = $con->query("SELECT u_name FROM Users WHERE email = '" . $_SESSION["email"] . "'");
    $store = $result->fetch_assoc();
    return $store["u_name"];
  }

}

?>
