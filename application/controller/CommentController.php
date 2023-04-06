<?php
session_start();
// Including the dependencies.
require_once 'application/model/db_conn.php';
require_once "application/model/Utilities.php";
require_once "application/model/DateGenerator.php";
class CommentController {

  public $utility;
  function __construct() {
    $this->utility = new Utilities;

  }

  function commenting($con,$current_user,$postId,$comment,$u_email,$commentId,) {
    $dg = new DateGenerator;
    $time = $dg->createDate();
    $this->utility->storeComment($con,$postId,$current_user,$time,$comment,$commentId);
  }

  function showComment($con,$commentId) {
    $data = $this->utility->showComment($con,$commentId);
    return $data;
  }

}

$comment_controller = new CommentController;

?>
