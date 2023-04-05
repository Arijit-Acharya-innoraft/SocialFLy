<?php
// require_once "application/controller/comment.php";
// $data = $cmt->showComment($con,$_POST["comment_id"]);
require_once "application/controller/CommentController.php";

$commentId = $_POST["comment_id"];
if(isset($_POST["user_id"])&&isset($_POST["post_id"])&&isset($_POST["commented_text"])&&isset($_SESSION["email"])) {
  $current_user = $_POST["user_id"];
  $postId = $_POST["post_id"];
  $comment = $_POST["commented_text"];
  $u_email = $_SESSION["email"];
  $comment_controller->commenting($con,$current_user,$postId,$comment,$u_email,$commentId);
}
$data = $comment_controller->showComment($con,$commentId);
?>
<div class="comment-details">
  <ul>
    <?php
    foreach ($data as $d) { 
      ?>
    <li><?php echo $d["commented_text"];?></li>
      <?php
    }
    ?>
  
  </ul>
</div>