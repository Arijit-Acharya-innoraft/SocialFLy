<?php
/**
 * 
 */
class Utilities {
  /**
   * 
   */
  function updateToken($con,$token,$email){
    $qry = "UPDATE Users SET token = '" . $token . "' WHERE email = '" . $email . "';";
    $con->query($qry);
  }

  /**
   * 
   */
  function checkPrevUser($con,$email){
    $qry = "SELECT email FROM Users WHERE email = '" . $email . "';";
    $res = $con->query($qry);
    $data = $res->fetch_assoc();
    return $data;
  }

  /**
   * 
   */
  function storeData($con,$email,$u_name,$password) {
    $qry = "INSERT INTO Users (email,u_name,user_password) VALUES ('" . $email . "','" . $u_name . "','" . $password ."');";
    $con->query($qry);
  }

  /**
   * 
   */
  function storePost($con,$email,$date,$txt,$img) {
    if(strlen($txt)>0||strlen($img)>21){
    $qry = "INSERT INTO posts (create_time,posted_text,posted_image,email) VALUES ('$date','$txt','$img','$email')";
    $con->query($qry);
    header("location:home");
    }
  }


  function viewPost($con,$limit){
    $qry = "SELECT create_time,posted_text,posted_image,u_name,p_photo,post_id FROM Users as Users JOIN posts as Posts ON Posts.email = Users.email ORDER BY Posts.create_time DESC LIMIT ". $limit . ";" ;
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  /**
   * This functino is used for storing the profile image of the logged in user.
   * @param con 
   * It is used to store the object of the mysqli class.
   * @param email
   * It is used to store the email address of the logged in user.
   * @return $result["p_photo"]
   * It returns the phofile photo of the user stored in the database.
   */
  function fetchProfile($con,$email){
    $qry = "SELECT p_photo FROM Users WHERE email = '$email' ;";
    $data = $con->query($qry);
    $result = $data->fetch_assoc();
    return $result["p_photo"];
  }

  /**
   * 
   */
  function toAscending($con,$email) {
    $qry = "SELECT * FROM posts WHERE email = '" . $email . "' ORDER BY create_time ;";
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }
  
  /**
   * 
   */
  function toDescending($con,$email) {
    $qry = "SELECT * FROM posts  WHERE email = '" . $email . "' ORDER BY create_time DESC";
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

}

?>
