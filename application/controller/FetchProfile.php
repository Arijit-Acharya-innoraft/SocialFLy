<?php

// Including the required dependencies.
require_once "application/model/Utilities.php";
/**
 * This class is used for acquiring the profile photo of the user, who is currently logged in.
 */
class ProfilePic {

  /**
   * This function calls a method from Utilities class present in model.
   * @param $con
   * It is an object of mysqli class.
   * @param $email 
   * It stores the email of the current user.
   * @return $p_photo
   * It returns the location of the profile photo of the user.
   */
  function fetchProfilePic($con,$email) {
    $uti = new Utilities;
    $p_photo = $uti->fetchProfile($con,$email);
    return $p_photo;
  }

}

?>
