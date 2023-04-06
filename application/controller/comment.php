<?php
require_once "application/model/db_conn.php";
require_once "application/model/Utilities.php";

class Comments {
  function showComment($con,$commentId) {
    $utility = new Utilities;
    $data = $utility->showComment($con,$commentId);
    return $data;
  }

}

$cmt =new Comments;
$data = $cmt->showComment($con,$_POST["comment_id"]);
