<?php
session_start();
// including the dependencies
require_once "appication/model/db_conn.php";
require_once "application/model/Utilities.php";
require_once "application/model/DateGenerator.php";

// storing the variables
$u_email = $_SESSION["email"];
$comment = $_POST["writeComment"];
$postId = $_POST["post_id"];
$dg = new DateGenerator;
$time = $dg->createDate();

$utility = new Utilities;
$utility->storeComment($con,$postId,$u_email,$time,$comment);

?>
