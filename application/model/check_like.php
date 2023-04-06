<?php
/**
 * This class is all about like function.
 * Its methods are used to count likes, update like count, check if a logged in user has liked a post or not.
 */
class LikeCount {

  /**
   * This function is used to count the total likes in  a post and store it in posts database.
   * @param mixed $con
   * @param mixed $likeId
   * 
   * @return integer
   */
  function counting_like($con,$likeId) {
    $qry = "SELECT COUNT(email) AS total FROM post_like WHERE like_id = '". $likeId . "';";
    $count = $con->query($qry);
    $data =$count->fetch_assoc();
    return ($data["total"]);
  }

  /**
   * This function is used for updating the like count on user click.
   * @param mixed $con
   * @param mixed $like_no
   * @param mixed $post_id
   * 
   * @return object
   */
  function updateLikeCount($con,$like_no,$post_id) {
    $qry = "UPDATE posts SET total_like = " . $like_no . " WHERE post_id = " . $post_id .";";
    $con->query($qry);
  }

  /**
   * @param mixed $con
   * @param mixed $post_id
   * 
   * @return 
   */
  function getTotalLikes($con,$post_id) {
    $qry = "SELECT total_like FROM posts WHERE post_id =" . $post_id .";";
    $data = $con->query($qry)->fetch_assoc(); 
    return $data["total_like"];
  }

  /**
   * This method is used for checking
   * @param mixed $con
   * @param mixed $email
   * @param mixed $likeId
   * 
   * @return [type]
   */
  function userLiked($con,$email,$likeId) {
    $qry = "SELECT create_time FROM post_like WHERE like_id = '" . $likeId . "' AND email = '" . $email . "';";
    $data = $con->query($qry);
    return ($data->num_rows);
  }
}

?>
