<?php
session_start();
// Including the dependencies.
require_once "appication/model/db_conn.php";
require_once "application/model/Utilities.php";
require_once "application/model/DateGenerator.php";

// Storing the variables.
$current_user = $_POST["user_id"];
$postId = $_POST["post_id"];
$comment = $_POST["commented_text"];
$u_email = $_SESSION["email"];
$comment = $_POST["writeComment"];
$postId = $_POST["post_id"];
$dg = new DateGenerator;
$time = $dg->createDate();

$utility = new Utilities;
$utility->storeComment($con,$postId,$current_user,$time,$comment);

echo "Hi";
?>
