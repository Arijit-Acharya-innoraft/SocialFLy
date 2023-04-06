<?php

/**
 * This class is used for validating the password, it has a method that checks the strength of the password.  
 */
class PasswordValidation {

 /**
  * This methods checks if the length of the password isn't less than 6.
  * It checks that at least 1 uppercase,1lowercase,1 digit and a specialcharacter is present or not.
  */
 function validatePassword($password) {
   $error="";
   if( strlen($password) < 8 ) {
     $error .= "Password too short!";
     }
     
     if( strlen($password) > 20 ) {
     $error .= "Password too long!";
     }
     
     if( !preg_match("#[0-9]+#", $password) ) {
     $error .= "Password must include at least one number!";
     }
     
     if( !preg_match("#[a-z]+#", $password) ) {
     $error .= "Password must include at least one letter!";
     }
     
     if( !preg_match("#[A-Z]+#", $password) ) {
     $error .= "Password must include at least one CAPS!
     ";
     }
     
     if( !preg_match("#\W+#", $password) ) {
     $error .= "Password must include at least one symbol!";
     }
     
   return $error;
 }
 
}

?>
