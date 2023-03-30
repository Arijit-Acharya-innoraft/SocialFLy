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
   * 
   * @param $con
   *  An object of the mysqli class.
   * @param $limit
   *  To store the no of posts to see at once.
   * @param $sort
   *  It contains the variable ASC or DESC or the sorting purpose.
   * @return $result
   *  An associative array containing the details of the posts. 
   */
  function viewPost($con,$limit,$sort){
    $qry = "SELECT Posts.email,create_time,posted_text,posted_image,u_name,p_photo,post_id FROM Users as Users JOIN posts as Posts ON Posts.email = Users.email ORDER BY Posts.create_time ". $sort ." LIMIT ". $limit . ";" ;
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
   * This function is used for storing the profile pic obtained from linkedin registered user.
   * @param con 
   *  It is used to store the object of the mysqli class.
   * @param email
   *  It is used to store the email address of the logged in user.
   * @param pic
   *  It is used to store the profile pic of the linked in user.
   */
  function storeProfile($con,$email,$pic) {
    $qry = "UPDATE Users SET p_photo = '" . $pic . "' WHERE email = '" . $email . "';";
    $con->query($qry);
  }

 /**
   * This function is used to check if a user has hit like on that particular post or not.
   * @param con 
   *  It is used to store the object of the mysqli class.
   * @param user_id
   *  It is used to store the email address of the logged in user who likes a post.
   * @param like_id
   *  It is used to store the id of the post liked by a user.
   * @return $result->num_rows
   *  It returns 0 for no rows found and 1 for one row found.  
   */
  function likeCheck($con,$user_id,$like_id) {
    $qry = "SELECT create_time  FROM post_like WHERE like_id = '" . $like_id . "' AND email = '" . $user_id . "';";
    $result = $con->query($qry);
    return $result->num_rows;
  }

  /**
   * This function is used to store the like id and user id in post_like table.
   * @param con 
   *  It is used to store the object of the mysqli class.
   * @param user_id
   *  It is used to store the email address of the logged in user who likes a post.
   * @param like_id
   *  It is used to store the id of the post liked by a user.
   * @param create_time 
   *  It is used for storin the like time of the user.
   */
  function likeStore ($con,$user_id,$create_time,$like_id) {
    $qry = "INSERT INTO post_like VALUES('" . $like_id . "','" .$create_time . "','" . $user_id ."');"  ;
    $con->query($qry);
  }

   /**
   * This function is used to remove the like id and user id in post_like table.
   * @param con 
   *  It is used to store the object of the mysqli class.
   * @param user_id
   *  It is used to store the email address of the logged in user who likes a post.
   * @param like_id
   *  It is used to store the id of the post liked by a user.
   */
  function likeDelete ($con,$user_id,$like_id) {
    $qry = "DELETE FROM post_like WHERE like_id ='" . $like_id ."' AND email = '" . $user_id . "';";
    $con->query($qry);
  }

  /**
   * This function is used to remove the like id and user id in post_like table.
   * @param con 
   *  It is used to store the object of the mysqli class.
   * @param like_id
   *  It is used to store the id of the post liked by a user.
   * @return $result->num_rows;
   *   It returns the number of likes in that post.
   */
  function countLikes($con,$like_id) {
    $qry = "SELECT email FROM post_like WHERE like_id ='" . $like_id . "';";
    $result = $con->query($qry);
    return $result->num_rows;
  }

 
 
  /**
   * @param mixed $con
   *  It stores   
   * @param mixed $post_id
   * @param mixed $email
   * @param mixed $create_time
   * @param mixed $comment
   * 
   * @return [type]
   */
  function storeComment($con,$post_id,$email,$create_time,$comment){
    $qry = "INSERT INTO post_comment VALUES ('" . $post_id . "','" . $create_time . "','" . $email ."','" . $comment . "');";
    $con->query($qry);
  }

  /**
   * @param mixed $con
   * @param mixed $post_id
   * 
   * @return [type]
   */
  function showComment($con,$post_id) {
    $qry = "SELECT * FROM post_comment WHERE post_id = " . $post_id. ";" ;
    $data = $con->query($qry);
    $result = $data->fetch_assoc();
    return $result;
  }

}

?>
