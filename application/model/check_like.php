<?php
// require_once "db_conn.php";
class LikeCount {

  function counting_like($con,$likeId) {
    $qry = "SELECT COUNT(email) AS total FROM post_like WHERE like_id = '". $likeId . "';";
    $count = $con->query($qry);
    $data =$count->fetch_assoc();
    return ($data["total"]);
  }

  function updateLikeCount($con,$like_no,$post_id) {
    $qry = "UPDATE posts SET total_like = " . $like_no . " WHERE post_id = " . $post_id .";";
    $con->query($qry);
  }

  function getTotalLikes($con,$post_id) {
    $qry = "SELECT total_like FROM posts WHERE post_id =" . $post_id .";";
    $data = $con->query($qry)->fetch_assoc(); 
    return $data["total_like"];
  }

  function userLiked($con,$email,$likeId) {
    $qry = "SELECT create_time FROM post_like WHERE like_id = '" . $likeId . "' AND email = '" . $email . "';";
    $data = $con->query($qry);
    return ($data->num_rows);
  }
}

?>
