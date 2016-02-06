<?php
if (isset($_SESSION['username']) || isset($_COOKIE['neAuth'])) {
  session_destroy($_SESSION['username']);
  setcookie('neAuth', '', time() -1);
  header('Location: index.php');
} else {
  $errorMsg = "You're not logged in.";
  header('Location: error.php?err='. $errorMsg);
}
?>
