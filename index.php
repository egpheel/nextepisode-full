<?php
session_start();
if (isset($_SESSION['username'])) {
  echo "hello ".$_SESSION['username'];
  echo "<br /><a href='logout.php'>logout</a>";
} else {
  echo "<a href='login.php'>login</a>";
}
?>
