<?php
class ResetPasswordDatabase
{

  function checkPassword($con, $email)
  {
    // fetching the previous password
    $pass_before = "SELECT user_password FROM Users WHERE email = '" . $email . "';";
    $res = $con->query($pass_before);
    $data = $res->fetch_assoc();
    return $data;
  }

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
