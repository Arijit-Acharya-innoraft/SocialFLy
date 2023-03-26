<?php
class ForgotEmailValidate
{
  function checkEmail($con, $email)
  {
    // Checking if the user email exists in the database.
    $result = $con->query("SELECT u_name FROM Users WHERE email = '" . $email . "'");
    if ($result->num_rows == 0) {
      return  "email id doesn't exist";
    }
    return "";
  }
}
