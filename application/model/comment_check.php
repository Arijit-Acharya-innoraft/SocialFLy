<?php
/**
 * This class is all about like function.
 * Its methods are used to count likes, update like count, check if a logged in user has liked a post or not.
 */
class CommentCount {

  /**
   * This function is used to count the total likes in  a post and store it in posts database.
   * @param mixed $con
   * @param mixed $likeId
   * 
   * @return integer
   */
  function counting_comment($con,$commentId) {
    $qry = "SELECT COUNT(email) AS total FROM post_comment WHERE comment_id = '". $commentId . "';";
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
  function updateCommentCount($con,$comment_no,$post_id) {
    $qry = "UPDATE posts SET total_comment = " . $comment_no . " WHERE post_id = " . $post_id .";";
    $con->query($qry);
  }

  /**
   * @param mixed $con
   * @param mixed $post_id
   * 
   * @return 
   */
  function getTotalComment($con,$post_id) {
    $qry = "SELECT total_comment FROM posts WHERE post_id =" . $post_id .";";
    $data = $con->query($qry)->fetch_assoc(); 
    return $data["total_comment"];
  }

  /**
   * This method is used for checking
   * 
   * @param mixed $con
   * @param mixed $email
   * @param mixed $likeId
   * 
   * @return [type]
   */
  function userCommented($con,$email,$commentId) {
    $qry = "SELECT create_time FROM post_comment WHERE comment_id = '" . $commentId . "' AND email = '" . $email . "';";
    $data = $con->query($qry);
    return ($data->num_rows);
  }

}

?>
