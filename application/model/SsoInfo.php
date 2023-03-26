<?php
require "application/controller/SsoLogin.php";
class SsoInfo {

  /**
   * 
   */
  public $userProfile;

  /**
   * 
   */
  public $config;

  /**
   * 
   */
  public $adapter;

  /**
   * 
   */
  public $lgin;

  /**
   * 
   */
  public function __construct() {

    $this->config = new Configuration;
    $this->adapter = $this->config->configLog();
    $this->lgin = new Login;
    $this->userProfile = $this->lgin->userLogin($this->adapter);
    print_r($this->userProfile);
  }

  public function fetchData() {
    $name = $this->userProfile["displayName"];
    return $name;
  }
}

$sso = new SsoInfo;
// echo ($sso->fetchData());
// header("location: dashboard");
?>