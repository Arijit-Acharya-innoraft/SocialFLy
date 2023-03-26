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

<link rel="stylesheet" href="public/assets/css/register.css">

<?php

require_once "application/view/header.php";
echo "<div class = 'error'><span id = 'error'>". $err_msg ."</span></div>";
require_once "application/view/register_section.php";
require_once "application/view/footer.php";
?>
<!-- <script src="public/assets/js/register.js"></script> -->
<?php
require_once "application/view/html_tail.php";

?>
