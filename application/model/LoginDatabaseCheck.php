<?php
/**
 * This class is used to validate the user entered email and password with that of database.
 * 
 */
class LoginDatabaseCheck  {

    /**
   * This method validates the email and password entered by the user with the database.
   * @param email
   *  for storing the email entered by the user.
   * @param pass
   *  to store the password entered by the user.
   * @param con
   *  an object of mysqli.
   */
  function matchDb($email,$pass,$con){
    $result = $con->query("SELECT user_password,u_name FROM Users WHERE email = '" . $email . "'");
    if ($result->num_rows == 0) {
      $msg= "Email id doesn't exist";
      return array(FALSE,$msg);
    } 
    else {
      $data = $result->fetch_assoc();
      if ($pass != $data['user_password']) {
        $msg = "Wrong Password";
        return array(FALSE,$msg);

      } 
      else {
        $msg = $data["u_name"];
        return array(TRUE,$msg);
      }
    }
  }

}
?>
