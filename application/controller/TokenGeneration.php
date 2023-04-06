<?php

/**
 * This class is usedd for generating the token .
 * It has got one method.
 */
class TokenGeneration {
  /**
   * This method creates random tokens using md5 function.
   * @return $token
   * It returns the generated token.
   */
  function  generatingToken() {
    $token = md5(rand());
    return $token;
  }

}

?>
