<?php

// Checks if session is not started then it starts the session.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Including all the dependecies.
require_once "application/model/DateGenerator.php";
require_once "application/model/db_conn.php";
require_once "application/model/Utilities.php";

/**
 * It basically stores the User entered data into the database.
 * It has three methods-> storeDate, inputStore and todataBase.  
 */
class Home {

  /**
   * This method is used for fetching the date.
   * @return $dg->createDate()
   * It returns the date obtained. 
   */
  function storeDate() {
    $dg = new DateGenerator;
    return ($dg->createDate());
  }

  /**
   * This method  is used to store the user input data.
   * @return [array($text,$locationImg)]
   * It returns the stored user entered text and image location. 
   */
  function inputStore() {
    if(isset($_POST["textarea"])||isset($_FILES['images']['name'])){
      $text = $_POST["textarea"];
      $image_name = $_FILES['images']['name'];
      $image_temp = $_FILES['images']['tmp_name'];
      $locationImg = "public/assets/images/" . $image_name;
      move_uploaded_file($image_temp, $locationImg);
      return array($text,$locationImg);
    }
  }

  /**
   * This method is used to 
   */
  function toDatabase($con,$email) {
    $date = $this->storeDate();
    $store = $this->inputStore();
    if(isset($store[0])||isset($store[1])){
      $uti = new Utilities;
      $uti->storePost($con,$email,$date,$store[0],$store[1]);
    }
  }
}

// Creating object of the Home class nd calling its method.
$home = new Home;
$home->toDatabase($con,$_SESSION["email"]);

/**
 * This class is used for creting an object of the Utilities class and calling its method for viewing the posts.
 */
class ShowPosts {

  /**
   * This method creates another object and calls its method for viewing the posts.
   * @param $con
   * It is an object of mysqli class.
   * @param $limit
   * It specifies the limit for the no of posts to be shown on each ajax call.
   * @return $store
   * It is an associative array containing the various posts and details for each posts.
   */
  function fetchDatabase($con,$limit) {
    $uti = new Utilities;
    $store = $uti->viewPost($con,$limit);
    return $store;
  }
  
}

?>
