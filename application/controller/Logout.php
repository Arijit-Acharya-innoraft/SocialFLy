<?php
session_start();
// If the session is set we are redirecting it to the  index page.
if(isset($_SESSION['login'])){
  header('Location: index.php');
}
// Unseting the session after that and destroying the session.
session_unset();
session_destroy();
header('Location: login');

?>
