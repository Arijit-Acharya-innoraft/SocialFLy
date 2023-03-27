<?php

session_start();
// Variable to store the error msg from the session.
$err_msg = "";
// Here if we are getting the error msg through session we are storing it in the variable and unseting the session message.
if (isset($_SESSION["msg"])) {
  $err_msg = $_SESSION["msg"];
  unset($_SESSION["msg"]);
}
require_once "application/view/html_head.php";
?>
<link rel="stylesheet" href="public/assets/css/header.css">
<link rel="stylesheet" href="public/assets/css/otp.css">
<link rel="stylesheet" href="public/assets/css/footer.css">
<?php
require_once "application/view/header.php";
echo "<div class = 'error'><span id = 'error'>". $err_msg ."</span></div>";
require_once "application/view/otp_section.php";
require_once "application/view/footer.php";
require_once "application/view/html_tail.php";

?>
