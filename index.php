<?php
session_start();
if (isset($_SESSION['username'])) {
  echo "hello ".$_SESSION['username'];
  echo "<br /><a href='logout.php'>logout</a>";
  echo "session";
} else if (isset($_COOKIE['neAuth'])) {
  echo "hello ".$_COOKIE['neAuth'];
  echo "<br /><a href='logout.php'>logout</a>";
  echo "cookie";
} else {
  echo "<a href='login.php'>login</a>";
}

$_SESSION['origin_page'] = $_SERVER['REQUEST_URI']; //make this the previous page for error.php
?>
