<?php
require_once "application/model/comment_check.php";
require_once  "application/model/db_conn.php";
$count_comment = new CommentCount;
$no_of_comments = $count_comment->counting_comment($con,$_POST["Post_Id"]);
echo $no_of_comments;
?>