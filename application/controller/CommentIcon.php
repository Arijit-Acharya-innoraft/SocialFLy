<?php
require_once "application/model/comment_check.php";
require_once  "application/model/db_conn.php";
$count_comment = new CommentCount;
$check = $count_comment->userCommented($con,$_POST["User_Id"],$_POST["Comment_Id"]);
if($check >0 ){
  echo "<i class= 'fa-solid fa-comments'></i>";
}
else {
  echo "<i class= 'fa-regular fa-comments'></i>";
}

?>
