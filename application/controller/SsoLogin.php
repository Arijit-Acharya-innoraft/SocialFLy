<?php
// Calling the dependencies.
require_once "application/model/db_conn.php";
require_once "application/model/ForgotEmailValidate.php"; 
require_once "application/model/Utilities.php";
require_once "vendor/autoload.php";
/**
 * This class is used for the linked in sign in controller.
 */
class Configuration {

  /**
   * This variable is used as an associative array for storing the configuration.
   */
  public $config;

  /**
   * The constructor stores the necessary information about the user id, secret key, the call back address and the scope.
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
   * This method is used for creating the object of the Hybridauth\Provider\LinkedIn class.
   * The  config
   */
  public function configLog() {
    $adapter = new Hybridauth\Provider\LinkedIn( $this->config );
    return $adapter;
  }

}

/**
 * This class  the object created ago to fetch the required values.
 */
class Login {

  /**
   * This method is used for getting the user information.
   * @param $adapter
   *  It is the object of the Hybridauth\Provider\LinkedIn class.
   */
  function userLogin($adapter){
    try {
      $adapter->authenticate();
      $userProfile = $adapter->getUserProfile();
      $userName = $userProfile->displayName;
      $userEmail =  $userProfile->email;
      $userImage = $userProfile->photoURL;

      return array($userEmail,$userImage,$userName);
    }
    catch( Exception $e ){
      echo $e->getMessage() ;
    }
  }

}

// Creating an object for the Configuration class and calling its method.
$conf = new Configuration;
$adapter=$conf->configLog();

// Creating an object for the login class and calling its method.
$lgin = new Login;
$user_info = $lgin->userLogin($adapter);

// Creating an object of ForgotEmailValidate class and calling its method.
$fe = new ForgotEmailValidate;
$response = $fe->checkEmail($con,$user_info[0]);
if($response == ""){
  $_SESSION['U_name'] = $user_info[2];
  $_SESSION["email"] = $user_info[0];
  header("location: home");
}
else{
  $uti = new Utilities;
  $uti->storeData($con,$user_info[0],$user_info[2],"defaultPassword");
  header("location: home");
}

?>
