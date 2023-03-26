<?php
/**
 * This class contains multiple methods serving various purpose.
 */
class Utilities {

  /**
   * This method is used for updating the token in the database.
   * @param $con
   * An object of fthe mysqli class.
   * @param $token
   * Contains the token to be stored in the database.
   * @param $email
   * The email of the user.
   */
  function updateToken($con,$token,$email){
    $qry = "UPDATE Users SET token = '" . $token . "' WHERE email = '" . $email . "';";
    $con->query($qry);
  }

  /**
   * This method is used for checking the previous user.
   * @param $con
   *  An object of fthe mysqli class.
   * @param $email
   *  The email of the user.
   * @return $data
   *  An associative array 
   */
  function checkPrevUser($con,$email){
    $qry = "SELECT email FROM Users WHERE email = '" . $email . "';";
    $res = $con->query($qry);
    $data = $res->fetch_assoc();
    return $data;
  }

  /**
   * This method is used for storing the data in the database.
   * @param $con
   * An object of fthe mysqli class.
   * @param $email
   * The email of the user.
   * @param $u_name
   *  This contains the user name.
   * @param $password
   *  The password of the user.
   */
  function storeData($con,$email,$u_name,$password) {
    $qry = "INSERT INTO Users (email,u_name,user_password) VALUES ('" . $email . "','" . $u_name . "','" . $password ."');";
    $con->query($qry);
  }

  /**
   * This method stores the information of the posts in posts table.
   * @param $con
   * An object of fthe mysqli class.
   * @param $email
   * The email of the user.
   * @param $date
   *  The date and time of the post.
   * @param $txt
   * It stores the text entered in the post.
   * @param $img
   *  It stores the image that the  user has entered.
   */
  function storePost($con,$email,$date,$txt,$img) {
    if(strlen($txt)>0||strlen($img)>21){
    $qry = "INSERT INTO posts (create_time,posted_text,posted_image,email) VALUES ('$date','$txt','$img','$email')";
    $con->query($qry);
    header("location:home");
    }
  }

  /**
   * This fuction is used to fetch the post data to view the post.
   * @param $con
   *  An object of the mysqli class.
   * @param $limit
   *  To store the no of posts to see at once.
   * @return $result
   *  An associative array containing the details of the posts. 
   */
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
   * This method is used for arranging the data in ascending format.
   * @param $con
   *  An object of fthe mysqli class.
   * @param $email
   *  The email of the user.
   * @return $result["p_photo"]
   *  It returns the phofile photo of the user stored in the database.
   */
  function toAscending($con,$email) {
    $qry = "SELECT * FROM posts WHERE email = '" . $email . "' ORDER BY create_time ;";
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }
  
  /**
   * This method is used for arranging the data in descending format.
   * @param $con
   *  An object of fthe mysqli class.
   * @param $email
   *  The email of the user.
   * @return $result["p_photo"]
   *  It returns the phofile photo of the user stored in the database.
   */
  function toDescending($con,$email) {
    $qry = "SELECT * FROM posts  WHERE email = '" . $email . "' ORDER BY create_time DESC";
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

}

?>
