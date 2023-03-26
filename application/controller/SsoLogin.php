<?php
require_once "vendor/autoload.php";
/**
 * 
 */
class Configuration {

  /**
   * 
   */
  public $config;

  /**
   * 
   */
  public function  __construct() {
    $this->config = [
      'callback' => 'http://test.com/ssologin',
      'keys'     => [
                      'id' => '77496atlhltbdc',
                      'secret' => 'A5mvEBqfWW2IkDS0'
                  ],
      'scope'    => 'r_liteprofile r_emailaddress',
    ];
  }
  
  /**
   * 
   */
  public function configLog() {
    $adapter = new Hybridauth\Provider\LinkedIn( $this->config );
    return $adapter;
  }

}

/**
 * 
 */
class Login {

  function userLogin($adapter){
    try {
      $adapter->authenticate();
      $userProfile = $adapter->getUserProfile();
      // $od = new ObjectDecode ;
      // $od->getValues($userProfile); 
      echo "<pre>"; print_r($userProfile) ; echo "</pre>";        
      // echo '<a href="logout">Logout</a>';
      return $userProfile;
    }
    catch( Exception $e ){
      echo $e->getMessage() ;
    }
  }
}

$conf = new Configuration;
$adapter=$conf->configLog();
$lgin = new Login;
$lgin->userLogin($adapter);
$config = new Configuration;
$adapter =$config->configLog();




try {
  if ($adapter->isConnected()) {
    echo "Hi";
      $adapter->disconnect();
      // clearstatcache();
      // echo (isset($_SESSION));
      echo 'Logged out the user';
      echo '<p><a href="login">Login</a></p>';

  }
}
catch( Exception $e ){
  echo $e->getMessage() ;
}



  // header("location: ssoinfo");

?>