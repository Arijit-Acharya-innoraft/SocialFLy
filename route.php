<?php
/**
 * This class is created for implementing the routing. 
 * It has got two functions, one for calling the  page if it finds proper uri,the other for aborting the task.
 * It has a constructor which stores the information about the uri and an associative array holding the routing information. 
 */
class Router {

  /**
   * This class variable is used to store the uri obtained.
   */
  public $uri;

  /**
   * This class variable stores the associative array containg the key value pair of uri and location.
   */
  public $routes=[];

  /**
   * This function construct is used for storing the uri and the routing information.
   */
  function __construct() {
    $this->uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $this->routes =[
      "/" => "application/view/login.php",
      "/login" => "application/view/login.php",
      "/LoginController" =>"application/controller/Login.php",
      "/register" => "application/view/register.php",
      "/home" => "application/view/home.php",
      "/registerbackend" => "application/controller/Register.php",
      "/logout" => "application/controller/Logout.php",
      "/ssologin" => "application/controller/SsoLogin.php",
      "/forgotpassword" => "application/view/forgotpassword.php",
      "/forgotbackend" => "application/controller/ForgotPassword.php",
      "/resetpassword" =>"application/view/resetpassword.php",
      "/openmail" => "application/view/Openmail.php",
      "/resetbackend" => "application/controller/ResetPassword.php",
      "/otpvalidation" => "application/view/otpvalidation.php",
      "/otpgetting" => "application/controller/OtpGetting.php",
      "/homebackend" => "application/controller/Home.php",
      "/posts" => "application/view/posts.php",
      "/fetchprofile" => "application/controller/FetchProfile.php",
      "/likeController" => "application/controller/LikeController.php",
      "/thumbsController" => "application/controller/ThumbsController.php",
      "/commentbackend" => "application/controller/CommentController.php",
      "/profile" => "application/view/profile.php",
      "/commenticon" => "application/controller/CommentIcon.php",
      "/commentno" => "application/controller/CommentNo.php"
    ];
  }

  /**
   * This function is used for redirecting to a particular website page on getting certain uri. .
   */
  function routeToPages() {
    $uri = $this->uri;
    $routes = $this->routes;
    if(array_key_exists($uri,$routes)) {
      require $routes[$uri];
    }
    else {
      $this->abort();
    }
  }

  /**
   * This function is used for sending the user to the error page if the user enters other url mistakenly.
   */
  function abort() {
    $error_code = http_response_code();
    echo "<h1>404 Page  not found.</h1>";
  }

}

?>