<?php
session_start();
require_once "application/model/db_conn.php";
require_once "application/model/Utilities.php";

class UpdateProfile
{
  public $email;
  public $uti;
  function __construct() {
    $this->email = $_SESSION["email"];
    $this->uti = new Utilities;
  }

  function updateImage($con)
  {
    $image_name = $_FILES['profile']['name'];
    $image_temp = $_FILES['profile']['tmp_name'];
    $locationImg = "public/assets/images/" . $image_name;
    move_uploaded_file($image_temp, $locationImg);
    $this->uti->storeProfile($con,$this->email,$locationImg);
  }

  function updateName($con)
  {
    $name = $_POST["name"];
    $this->uti->updateName($con, $name, $this->email);
  }
}

$updateProfile = new UpdateProfile;
if((isset($_FILES["profile"]['name'])) && $_FILES["profile"]['name']!=""){
  $updateProfile->updateImage($con);
}
if((isset($_POST["name"]))&& $_POST["name"]!="" ){
  $updateProfile->updateName($con); 
}
