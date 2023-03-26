<?php
class TokenGeneration {
  function  generatingToken() {
    $token = md5(rand());
    return $token;
  }
}
?>