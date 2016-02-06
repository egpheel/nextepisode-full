<?php
session_start();
if (isset($_SESSION['username']) || isset($_COOKIE['neAuth'])) {
  session_destroy();
  setcookie('neAuth', '', time() -1);
  header('Location: ./');
} else {
  $errorMsg = "You're not logged in.";
  header('Location: error.php?err='. $errorMsg);
}
?>
