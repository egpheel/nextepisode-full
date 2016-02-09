<?php
include_once "libs/db_config.php";

session_start();
if (isset($_SESSION['username']) || isset($_COOKIE[COOKIE_NAME])) {
  session_destroy(); //destroy the session
  setcookie(COOKIE_NAME, '', time() -1); //destroy the cookie
  header('Location: ./');
} else {
  $errorMsg = "You're not logged in.";
  header('Location: error.php?err='. $errorMsg);
}
?>
